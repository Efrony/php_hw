<?php

function countCart(){
    $session = getSession1();
    $sqlSumm = "SELECT * FROM `cart` WHERE id_session = {$session};";
    $cartList = getArrayDB($sqlSumm);
    return count($cartList);
}

function addToCart($id_product)
{
    $session = getSession1();
    $data = json_decode(file_get_contents('php://input'));
    $id_product = $data->id_product;
    
    executeQuery("INSERT INTO `cart` (`id_session`, `id_product`) VALUES ('{$session}', '{$id_product}');");

    $response = [
        'countCart' => countCart()
    ];
    header("Content-type: application/json");
    echo json_encode($response);
}


