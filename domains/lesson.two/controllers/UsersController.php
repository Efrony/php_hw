<?php

namespace app\controllers;

use app\model\Users;

class UsersController extends Controller
{
    public function actionDefault()
    {
        $isAuth = false;
        /*if (isset($_POST['login']) && isset($_POST['password'])) {
            $this->actionLogin();
        }
        */
        echo $this->render('users', [
            'isAuth' => $isAuth,
        ]);

    }
    private function actionLogin()  // после нажатия кнопки логин
    {
        $login = $_POST['login'];
        $pass = $_POST['password'];

        if (!$this->isCompliance($login, $pass)) {  // если не соответствует логин и пароль
            $message = 'Не верный логин или пароль';
            header("Location: /users/?loginmessage={$message}");
            die;
        } else {
            if ($_POST['remember'] == 'yes') { // если нажата кнопка Запомнить 
                $hash = uniqid(rand(), true);  // генерировать случайный хэш
                $id = $_SESSION['id'];

                $params = [
                    'id_hash' => $hash,
                    'id' => $id
                ];

                executeQuery("UPDATE `users` SET `hash` = :id_hash WHERE (`id` = :id);", $params); // записать новый хэш в бд

                setcookie("hash", $hash, time() + 36000, '/');  //  установить куки
            }
        }
        header("Location: /users/");
    }

    private function isCompliance($login, $pass)
    {
        $row = Users::getWhere('email', $login);

        if (password_verify($pass, $row['password'])) {
            $_SESSION['login'] = $login;
            $_SESSION['id'] = $row['id'];
            $this->onceSaveCartID($row);
            return true;
        }
        return false;
    }


    private function onceSaveCartID($row)
    {
        $login = $row['email'];
        $id_cart = $row['id_cart_session'];
        $cookie = $_COOKIE['PHPSESSID'];
        if (empty($id_cart)) {
            executeQuery("UPDATE `users` SET `id_cart_session` = :cookie WHERE  `email` = :email;", ['cookie' => $cookie, 'email' => $login]);
        } else {
            session_destroy();
            session_id($id_cart);
        }
    }

    public function getUser()
    {
        return $this->isAuth() ? $_SESSION["login"] : "Guest";
    }

    private function isAuth() //проверка авторизации 
    {
        if (isset($_COOKIE['hash'])) {

            $hash = $_COOKIE['hash'];
            $row = Users::getWhere('hash', $hash);

            $user = $row['email'];
            if (!empty($user)) {
                $_SESSION['login'] = $user;
            }
        }
        return isset($_SESSION['login']) ? true : false;
    }


    public function logout()
    {
        setcookie("PHPSESSID", null, time() - 1, '/');
        setcookie("hash", null, time() - 1, '/');
        header("Location: /");
    }
}
