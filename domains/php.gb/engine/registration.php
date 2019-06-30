<?php

function registration()
{
    $data = json_decode(file_get_contents('php://input'));
    $name = $data->name;
    $email = $data->email;
    $password = $data->password;
    $phone = $data->phone;
    if (isRegistred($email)) {
        $message = 'Такой e-mail уже зарегистрирован';
        $classValid =  'invalidForm ';
    } else {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        executeQuery("INSERT INTO `users` (`name`, `email`, `password`, `phone`) VALUES ('{$name}', '{$email}', '{$hash}', '{$phone}');");

        $message = 'Регистрация прошла успешно';
        $classValid =  'validForm';
    }
    $response = [
        'message' => $message,
        'classValid' => $classValid,
    ];

    header("Content-type: application/json");
    echo json_encode($response);
}

function isRegistred($email)
{
    $result = getArrayDB("SELECT email FROM users WHERE email = '{$email}';");
    $row = $result[0];
    if (is_null($row['email'])) {
        return false;
    } else {
        return true;
    }
}
