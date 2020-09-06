<?php

use App\Components\Router as Router;

//Определяем корневую папку проекта
define('ROOT', __DIR__);

// Подключаем автозагрузчик пространства имен
require_once(ROOT . '/vendor/autoload.php');


session_start();

// Вызов Router
$router = new Router();
$router->run();