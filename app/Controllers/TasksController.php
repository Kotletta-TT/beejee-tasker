<?php

namespace App\Controllers;

use App\Models\Model as Model;


class TasksController
{


    public function actionIndex($params)
    {
        $tasksList = array();
        $tasksList = Model::getTasksList($params);
        // ДЛЯ ТЕСТОВ
        $tasksList['count'] = 9;
        $tasksList['page'] = $params['page'];
        $this->render(ROOT . '/views/layouts/layout.php', ROOT . '/views/index.php', $tasksList);

    }

    public function actionAdd()
    {
        $this->render(ROOT . '/views/layouts/layout.php', ROOT . '/views/add.php');
    }

    public function actionEdit()
    {
        $this->render(ROOT . '/views/layouts/layout.php', ROOT . '/views/edit.php');
    }

    public function render($layout, $template, $data='') {
        include $layout;
    }
}