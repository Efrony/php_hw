<?php

namespace app\controllers;

use app\model\Users;

class UsersController extends Controller
{
    public function actionDefault()
    {
        echo $this->render('users', [
            'isAuth' => Users::isAuth(),
        ]);
    }
    public function actionLogin()  // после нажатия кнопки логин
    {
        $login = $_POST['login'];
        $pass = $_POST['password'];

        if (!Users::isCompliance($login, $pass)) {  // если не соответствует логин и пароль
            $message = 'Не верный логин или пароль';
            header("Location: /users/default/?loginmessage={$message}"); 
            die;
        } else {
            if ($_POST['remember'] == 'yes') { // если нажата кнопка Запомнить 
                $hash = uniqid(rand(), true);  // генерировать случайный хэш
                $user = Users::getObjectWhere('email', $login);
                $user->hash = $hash;
                $user->update(); // записать новый хэш в бд
                setcookie("hash", $hash, time() + 36000, '/');  //  установить куки
            }
        }
        header("Location: /users/");
    }

    public function actionExit()
    {
        setcookie("PHPSESSID", null, time() - 1, '/');
        setcookie("hash", null, time() - 1, '/');
        header("Location: /");
    }
}
