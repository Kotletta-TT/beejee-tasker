<?php

namespace App\Models;

use App\Components\DB as DB;

class Model
{
    public static function getTasksList($params)
    {
        $tasksList = array();
        $tasksList['countPages'] = self::countPages($params['countPageItems']);
        $db = DB::getConnection();
        $sortby = self::sortValid($params['sortby']);
        $order = $params['order'];
        $stmt = $db->prepare("SELECT * FROM tasks ORDER BY " . $sortby .  " " . $order . " LIMIT 3 OFFSET :offset");
        $stmt->bindParam(':offset', $params['offset'], \PDO::PARAM_INT);
        $stmt->execute();

        $i = 0;
        while ($row = $stmt->fetch()) {

            $tasksList['tasks'][$i]['id'] = $row['id'];
            $tasksList['tasks'][$i]['email'] = htmlentities($row['email']);
            $tasksList['tasks'][$i]['username'] = htmlentities($row['username']);
            $tasksList['tasks'][$i]['text'] = htmlentities($row['text']);
            $tasksList['tasks'][$i]['status'] = $row['status'];
            $tasksList['tasks'][$i]['is_edit'] = $row['is_edit'];
            $i++;
        }

        return $tasksList;
    }

    public static function setTask($data)
    {

        $db = DB::getConnection();
        extract($data);
        $stmt = "INSERT INTO tasks (username, email, text) VALUES (:username, :email, :text)";
        $stmt = $db->prepare($stmt);
        $stmt->bindParam(':username', $user, \PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, \PDO::PARAM_STR);
        $stmt->bindParam(':text', $text, \PDO::PARAM_STR);
        $stmt->execute();

        return true;
    }

    public static function updateTask($data)
    {
        $db = DB::getConnection();
        extract($data);
        $stmt = "UPDATE tasks SET `username`= :username, `email`= :email, 
                `text`= :text, `status`= :status, `is_edit`= :is_edit WHERE `id`= :id";
        $stmt = $db->prepare($stmt);
        $stmt->bindParam(':username', $user, \PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, \PDO::PARAM_STR);
        $stmt->bindParam(':text', $text, \PDO::PARAM_STR);
        $stmt->bindParam(':status', $status, \PDO::PARAM_INT);
        $stmt->bindParam(':is_edit', $is_edit, \PDO::PARAM_INT);
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
        $stmt->execute();
    }

    public static function sortValid($sortby)
    {
        $sortWhiteList = ['username', 'email', 'status'];
        return in_array($sortby, $sortWhiteList) ? $sortby : 'username';
    }

    public static function countPages($countPageItems)
    {
        $db = DB::getConnection();
        $stmt = "SELECT COUNT(*) FROM tasks";
        $allTaks = $db->query($stmt)->fetchColumn();
        return ceil($allTaks / $countPageItems);
    }

    public static function getUser($user)
    {
        $db = DB::getConnection();
        $stmt = "SELECT * FROM users WHERE username = ?";
        $stmt = $db->prepare($stmt);
        $stmt->execute([$user]);
        return $stmt->fetch();
    }

    public static function getTaskById($id)
    {
        $db = DB::getConnection();
        $stmt = "SELECT * FROM tasks WHERE `id` = :id";
        $stmt = $db->prepare($stmt);
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }
}

