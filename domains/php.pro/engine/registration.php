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
        
        $params = [
            'id_name' =>$name,
            'email' =>$email,
            'phone' =>$phone,
            'id_hash' => $hash
        ];

        executeQuery("INSERT INTO `users` (`name`, `email`, `password`, `phone`) VALUES (:id_name, :email, :id_hash, :phone);", $params);

        
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
    $row = getOneDB("SELECT email FROM users WHERE email = :email;" , ['email'=> $email]);
    if (is_null($row['email'])) {
        return false;
    } else {
        return true;
    }
}
