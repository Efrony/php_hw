<?php

function countCart(){
    $session = getSession1();
    $sqlSumm = "SELECT * FROM `cart` WHERE id_session = {$session};";
    $cartList = getArrayDB($sqlSumm);
    return count($cartList);
}

function addToCart()
{
    $session = getSession1();
    $data = json_decode(file_get_contents('php://input'));
    $id_product = $data->id_product;
    
    executeQuery("INSERT INTO `cart` (`id_session`, `id_product`, `quantity`) VALUES ('{$session}', '{$id_product}', '1');");

    $response = [
        'countCart' => countCart()
    ];

    header("Content-type: application/json");
    echo json_encode($response);
}

function deleteToCart(){
    $session = getSession1();
    $data = json_decode(file_get_contents('php://input'));
    $id_cart_item = $data->id_cart_item;
    
    executeQuery("DELETE FROM `cart` WHERE (`id` = '{$id_cart_item}')");

    $response = [
        'id_deleted' => $id_cart_item,
        'countCart' => countCart()

    ];
    header("Content-type: application/json");
    echo json_encode($response);
}
