<?php

namespace App\Controllers;

use App\Models\Model;

class LoginController
{
    public function actionIndex()
    {
        $this->render(ROOT . '/views/layouts/layout.php', ROOT . '/views/login.php');
    }

    public function actionCheck()
    {
        $feedback = array();
        $username = $_POST['username'] ?? null;
        $password = $_POST['password'] ?? null;
//        if (!$username || !$password) {
//            $feedback['errors']['username'] = 'Заполните поле';
//            $feedback['errors']['password'] = 'Заполните поле';
//            $this->render(ROOT . '/views/layouts/layout.php', ROOT . '/views/login.php', $feedback);
//        }
        $find_user = Model::getUser($username);
        if (!empty($find_user)) {
            if (password_verify($password, $find_user['password'])) {
                $_SESSION['admin'] = true;
                header("Location: /");
            }
            else {
                $feedback['errors']['password'] = 'Неверный пароль';
                $this->render(ROOT . '/views/layouts/layout.php', ROOT . '/views/login.php', $feedback);
            }
        }

        else {
            $feedback['errors']['username'] = 'Нет такого пользователя';
            $this->render(ROOT . '/views/layouts/layout.php', ROOT . '/views/login.php', $feedback);
        }
    }

    public function actionLogout()
    {
        unset($_SESSION['admin']);
        header("Location: /");
    }

    public function render($layout, $template, $data='') {
        include $layout;
    }
}