<?php

namespace App\Controllers;

use App\Models\Model as Model;


class TasksController
{


    public function actionIndex()
    {
        if (!empty($_GET['order'])) $_SESSION['order'] = $_GET['order'];
        if (!empty($_GET['sortby'])) $_SESSION['sortby'] = $_GET['sortby'];
        $data = Model::getTasksList();
        $this->render(ROOT . '/views/layouts/layout.php', ROOT . '/views/index.php', $data);

    }

    public function actionAdd()
    {
        $this->render(ROOT . '/views/layouts/layout.php', ROOT . '/views/add.php');
    }

    public function actionSave()
    {
        $validData = $this->validPlaces();
        extract($validData);
        if (empty($errors)) {
            $query_data = compact($user, $email, $text);
            $success = Model::setTask($query_data);

        }
        $this->render(ROOT . '/views/layouts/layout.php', ROOT . '/views/add.php', ['success' => $success, 'errors' => $errors]);
    }

    public function actionEdit()
    {
        if (!$_SESSION['admin'] == true) {
            header("Location: /");
        }
        $id = $_GET['id'];
        $_SESSION['itemId'] = $id;
        $item = Model::getTaskById($id);
        $this->render(ROOT . '/views/layouts/layout.php', ROOT . '/views/edit.php', $item);

    }

    public function actionUpdate()
    {
        if ($_SESSION['admin'] == true) {
            $status = (int)$_POST['status'] ?? null;
            $validData = $this->validPlaces();
            $id = $_SESSION['itemId'];
            extract($validData);
            if (empty($errors)) {
                $query_data = compact('user', 'email', 'text', 'status', 'id');
                Model::updateTask($query_data);
                unset($_SESSION['itemId']);
                header('Location: /');
            }
            $this->render(ROOT . '/views/layouts/layout.php', ROOT . '/views/edit.php', ['errors' => $errors]);
        }
    }

    public function render($layout, $template, $data='') {
        include $layout;
    }

    public function validPlaces ()
    {
        $errors = array();
        $user = $_POST['inputUsername'] ?? null;
        $email = $_POST['inputEmail'] ?? null;
        $text = $_POST['inputText'] ?? null;

        if (!$user) $errors['username'] = 'Заполните правильно поле User';
        if (!filter_var($email,FILTER_VALIDATE_EMAIL)) $errors['email'] = 'Заполните правильно поле Email';
        if (!$text) $errors['text'] = 'Заполните поле текст';
        return ['user' => $user, 'email' => $email, 'text' => $text, 'errors' => $errors];
    }
}