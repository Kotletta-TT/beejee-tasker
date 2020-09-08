<?php

namespace App\Components;

use App\Controllers\TasksController as TasksController;
use App\Controllers\LoginController as LoginController;

class Router
{
    private $routes;
    private $prefix_controllers = 'App\\Controllers\\';

    //В конструкторе подключаем файл маршрутов
    public function __construct()
    {
        $routes_path = ROOT . '/config/routes.php';
        $this->routes = include($routes_path);
    }


    private function getURI()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    public function run()
    {
        $uri = $this->getURI();
        foreach ($this->routes as $uriPattern => $path) {
            if (preg_match("~$uriPattern~", $uri)) {
                $segments = explode('/', $path);
                $controllerName = $this->prefix_controllers . ucfirst(array_shift($segments).'Controller');
                $actionName = 'action' . ucfirst(array_shift($segments));
                $runController = new $controllerName;
                $runController->$actionName();
                break;
            }
        }
    }
}