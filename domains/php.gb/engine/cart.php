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
    
    executeQuery("INSERT INTO `cart` (`id_session`, `id_product`, `quantity`) VALUES ('{$session}', '{$id_product}', '1');");

    $response = [
        'countCart' => countCart()
    ];

    header("Content-type: application/json");
    echo json_encode($response);
}

function deleteToCart($id_cart_item){
    $session = getSession1();
    $data = json_decode(file_get_contents('php://input'));
    $id_cart_item = $data->id_cart_item;
    
    executeQuery("DELETE FROM `cart` WHERE (`id` = '{$id_cart_item}')");

    $response = [
        'countCart' => countCart()
    ];

    header("Content-type: application/json");
    echo json_encode($response);
}
