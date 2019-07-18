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
            $id = $_SESSION['id'];

            $params = [
                'id_hash' => $hash,
                'id' => $id
            ];

            executeQuery("UPDATE `users` SET `hash` = :id_hash WHERE (`id` = :id);", $params); // записать новый хэш в бд

            setcookie("hash", $hash, time() + 36000, '/');  //  установить куки
        }
    }
    header("Location: /my_account/");
}

function isCompliance($login, $pass)
{
    $login = $login;
    $row = getOneDB("SELECT * FROM `users` WHERE email = :id_login;", ['id_login' => $login]);
    if (password_verify($pass, $row['password'])) {
        $_SESSION['login'] = $login;
        $_SESSION['id'] = $row['id'];
        onceSaveCartID($row);
        return true;
    }
    return false;
}


function onceSaveCartID($row)
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

function getUser()
{
    return isAuth() ? $_SESSION["login"] : "Guest";
}

function isAuth() //проверка авторизации 
{
    if (isset($_COOKIE['hash'])) {
        $hash = $_COOKIE['hash'];
        $row = getOneDB("SELECT * FROM `users` WHERE `hash` = :id_hash;", ['id_hash' => $hash]);
        $user = $row['email'];
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
