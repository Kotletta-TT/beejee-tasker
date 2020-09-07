<?php

namespace App\Models;

use App\Components\DB as DB;

class Model
{
    public static function getTasksList ($params)
    {
        $sortby = $params['sortby'] ?? 'username';
        $order = $params['order'] ?? 'asc';
        $tasksList = array();
        $db = DB::getConnection();
        $stmt = $db->prepare("SELECT * FROM tasks ORDER BY :sortby, :order");
        $stmt->bindParam(":sortby", $sortby, \PDO::PARAM_STR_CHAR);
        $stmt->bindParam(":order", $order, \PDO::PARAM_STR_CHAR);
        $stmt->execute();
        //$query = $db->query($stmt);

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
        $query = $db->prepare($stmt);
        $query->execute($data);

        return true;
    }
}