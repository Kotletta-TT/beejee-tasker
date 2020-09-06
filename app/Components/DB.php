<?php

namespace App\Components;

class DB
{
    public static function getConnection()
    {
        $paramsPath = ROOT . '/config/db_params.php';
        $params = include($paramsPath);
        extract($params);
        $opt = [
            \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";


        $db = new \PDO($dsn, $dbuser, $dbpass, $opt);
        return $db;
    }

    public static function addTask()
    {

    }
}