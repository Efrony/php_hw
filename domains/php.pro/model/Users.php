<?php

namespace app\model;

class Users extends DbModel
{
    public static function getNameTable()
    {
        return 'users';
    }

    public static function getUser()
    {
        return Users::isAuth() ? $_SESSION["email"] : "Guest";
    }

    public static function isAuth() //проверка авторизации 
    {
        if (isset($_COOKIE['hash'])) {
            $hash = $_COOKIE['hash'];
            $row = Users::getWhere('hash', $hash);
            $user = $row['email'];
            if (!empty($user)) {
                $_SESSION['email'] = $user;
            }
        }
        return isset($_SESSION['email']) ? true : false;
    }

    public static function isCompliance($login, $pass)
    {
        $row = Users::getWhere('email', $login);
        if (password_verify($pass, $row['password'])) {
            $_SESSION['email'] = $login;
            //Users::onceSaveCartID($row);
            return true;
        }
        return false;
    }

    private static function onceSaveCartID($row)
    {
        $login = $row['email'];
        $id_cart = $row['id_cart_session'];
        $cookie = $_COOKIE['PHPSESSID'];
        if (empty($id_cart)) {
            $user = Users::getObjectWhere('email', $login);
            $user->id_cart_session = $cookie;
            $user->update();
        } else {
           // session_destroy();
            //session_write_close();
            //session_register_shutdown();
           // setcookie("PHPSESSID", null, time() - 100, '/');
           
            session_id($id_cart);
            
        }
    }
}
