<?php

namespace App\Controllers;

use App\Models\Model;

class LoginController
{
    public function actionIndex()
    {
        $this->render(ROOT . '/views/layouts/layout.php', ROOT . '/views/login.php');
    }

    //Как и в другом контроллере убрать в Класс.
    public function render($layout, $template, $data='') {
        include $layout;
    }
}