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

    public function actionSave()
    {
        $feedback = array();
        $user = $_POST['inputUsername'] ?? null;
        $email = $_POST['inputEmail'] ?? null;
        $text = $_POST['inputText'] ?? null;

        if (!$user) $feedback['errors']['username'] = 'Заполните правильно поле User';
        if (!filter_var($email,FILTER_VALIDATE_EMAIL)) $feedback['errors']['email'] = 'Заполните правильно поле Email';
        if (!$text) $feedback['errors']['text'] = 'Заполните поле текст';

        if (!isset($feedback['errors'])) {
            $query_data = array($user, $email, $text);
            $feedback['success'] = Model::setTask($query_data);
        }
        $this->render(ROOT . '/views/layouts/layout.php', ROOT . '/views/add.php', $feedback);
    }

    public function actionEdit()
    {
        $this->render(ROOT . '/views/layouts/layout.php', ROOT . '/views/edit.php');
    }

    public function render($layout, $template, $data='') {
        include $layout;
    }

}