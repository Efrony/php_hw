<?php

namespace app\model;
use app\model\Cart;

class Users extends DbModel
{
    public static function getNameTable()
    {
        return 'users';
    }

    public static function getUser()
    {
        return Users::isAuth() ? $_SESSION["login"] : "Guest";
    }

    public static function isAuth() //проверка авторизации 
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

    public static function isCompliance($login, $pass)
    {
        $row = Users::getWhere('email', $login);
        if (password_verify($pass, $row['password'])) {
            $_SESSION['login'] = $login;
            $_SESSION['id'] = $row['id'];
            Users::onceSaveCartID($row);
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
            session_destroy();
            setcookie("PHPSESSID", null, time() - 100, '/');
            session_id($id_cart);
        }
    }
}