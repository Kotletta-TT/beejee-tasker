<?php

namespace App\Models;

use App\Components\DB as DB;

class Model
{
    public static function getTasksList ()
    {
        $countPageItems = 3;
        $page = $_GET['page'] ?? 1;
        $tasksList = array();
        $tasksList['countPages'] = self::countPages($countPageItems);
        $tasksList['sortby'] = $_SESSION['sortby'] ?? $_GET['sortby'] ??  'username';
        $tasksList['order'] = $_SESSION['order'] ?? $_GET['order'] ?? 'asc';
        $offset = ($page - 1) * $countPageItems;
        $db = DB::getConnection();
        $sortby = self::sortValid($tasksList['sortby']);
        $order = $tasksList['order'];
        if ($order == 'desc') {
            $stmt = $db->prepare("SELECT * FROM tasks ORDER BY ".$sortby." DESC LIMIT 3 OFFSET :offset");
        }
        else {
            $stmt = $db->prepare("SELECT * FROM tasks ORDER BY ".$sortby." ASC LIMIT 3 OFFSET :offset");
        }

        $stmt->bindParam(':offset', $offset, \PDO::PARAM_INT);
        $stmt->execute();



        $i = 0;
        while ($row = $stmt->fetch()) {

            $tasksList['tasks'][$i]['id'] = $row['id'];
            $tasksList['tasks'][$i]['email'] = $row['email'];
            $tasksList['tasks'][$i]['username'] = $row['username'];
            $tasksList['tasks'][$i]['text'] = $row['text'];
            $tasksList['tasks'][$i]['status'] = $row['status'];
            $tasksList['tasks'][$i]['is_edit'] = $row['is_edit'];
            $i++;
        }

        return $tasksList;
    }

    public static function setTask($data) {

        $feedback = array();
        $db = DB::getConnection();
        $stmt = "INSERT INTO tasks (username, email, text) VALUES (:username, :email, :text)";
        $stmt = $db->prepare($stmt);
        $stmt->execute($data);

        return true;
    }

    public static function sortValid ($sortby)
    {
        $sortWhiteList = ['username', 'email', 'status'];
        return in_array($sortby, $sortWhiteList) ? $sortby : 'username';
    }

    public static function countPages ($countPageItems)
    {
        $db = DB::getConnection();
        $stmt = "SELECT * FROM tasks";
        $stmt = $db->query($stmt);
        return ceil(count($stmt->fetchAll()) / $countPageItems);
    }

    public static function getUser($user)
    {
        $db = DB::getConnection();
        $stmt = "SELECT * FROM users WHERE username = ?";
        $stmt = $db->prepare($stmt);
        $stmt->execute([$user]);
        return $stmt->fetch();
    }
}

