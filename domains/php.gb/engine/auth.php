<?php
session_start();
$allow= false;






function getSession1()
{
    return '111';
}

function isAuth()
{
    if (isset($_COOKIE['hash'])) {
        $hash = $_COOKIE['hash'];
        $result = executeQuery("SELECT * FROM 'users' WHERE 'hash' = {$hash}");
        $row = mysqli_fetch_assoc($result);
        $user = $row['login'];
        if (!empty($user)) {
            $_SESSION['login'] = $user;
        }
    }
    return false; //isset($_SESSION['login']) ? true : false;
}

function login()
{
    if (isset($_GET['login'])) {
        $login = $_GET['login'];
        $pass = $_GET['pass'];

        if (isLogin($login, $pass)) {
            if (isset($_GET['save'])) {
                $hash = uniqid(rand(), true);
                $id = mysqli_real_escape_string(getDB(), (string)htmlspecialchars(strip_tags($_SESSION['id'])));
                executeQuery("UPDATE 'users' SET 'hash' = {$hash} WHERE 'users'.id = {$id}");
                setcookie("hash", $hash, time() + 36000);
            }
            $allow = true;
        } else {
            return ('Не верный логин или пароль');
        }
    }
}

function isLogin($login, $pass)
{
    $login = mysqli_real_escape_string(getDB(), (string)htmlspecialchars(strip_tags($login)));
    $result = executeQuery("SELECT * FROM 'users' WHERE 'login' = {$login}");
    $row = mysqli_fetch_assoc($result);
    if(password_verify($pass, $row['pass'])) {
        $_SESSION['login'] = $login;
        $_SESSION['id'] = $row['id'];
        return true;
    }
    return false;
}

function getUser()
{
    return isAuth() ? $_SESSION["login"] : "guest";
}

function logout()
{
    if (isset($_GET['logout'])) {
        session_destroy();
        setcookie("hash");
        header("Location: /");
    }
}
