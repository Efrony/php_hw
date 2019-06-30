<?php

function login()  // после нажатия кнопки логин
{
    $login = $_POST['login'];
    $pass = $_POST['password'];

    if (!isCompliance($login, $pass)) {  // если не соответствует логин и пароль
        $message = 'Не верный логин или пароль';
        header("Location: /my_account/?loginmessage={$message}");
        die;
    } else {
        if ($_POST['remember'] == 'yes') { // если нажата кнопка Запомнить 
            $hash = uniqid(rand(), true);  // генерировать случайный хэш
            $id = mysqli_real_escape_string(getDB(), (string)htmlspecialchars(strip_tags($_SESSION['id'])));
            executeQuery("UPDATE `shop`.`users` SET `hash` = '{$hash}' WHERE (`id` = '{$id}');"); // записать новый хэш в бд
            setcookie("hash", $hash, time() + 36000, '/');  //  установить куки
        }
    }
}

function isCompliance($login, $pass)
{
    $login = mysqli_real_escape_string(getDB(), (string)htmlspecialchars(strip_tags($login)));
    $result = executeQuery("SELECT * FROM shop.users WHERE email = '{$login}';");
    $row = mysqli_fetch_assoc($result);
    if (password_verify($pass, $row['password'])) {
        $_SESSION['login'] = $login;
        $_SESSION['id'] = $row['id'];
        onceSaveCartID($row);
        return true;
    }
    return false;
}


function onceSaveCartID($row)
{   $login = $row['email'];
    $id_cart = $row['id_cart_session'];
    if (empty($id_cart)) {
        executeQuery("UPDATE `users` SET `id_cart_session` = '{$_COOKIE['PHPSESSID']}' WHERE  `email` = '{$login}';");
    } else {
        session_destroy();
        session_id($id_cart);
    }
}

function getUser()
{
    return isAuth() ? $_SESSION["login"] : "guest";
}

function isAuth() //проверка авторизации 
{
    if (isset($_COOKIE['hash'])) {
        $hash = $_COOKIE['hash'];
        $result = executeQuery("SELECT * FROM shop.users WHERE `hash` = '{$hash}';");
        $row = mysqli_fetch_assoc($result);
        $user = $row['login'];
        if (!empty($user)) {
            $_SESSION['login'] = $user;
        }
    }
    return isset($_SESSION['login']) ? true : false;
}


function logout()
{
    setcookie("PHPSESSID", null, time() - 1, '/');
    setcookie("hash", null, time() - 1, '/');
    header("Location: /");
}
