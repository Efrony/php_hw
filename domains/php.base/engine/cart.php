<?php

function countCart()
{
    $session = session_id();
    $sqlSumm = "SELECT * FROM `cart` WHERE id_session = '{$session}';";
    $cartList = getArrayDB($sqlSumm);
    return count($cartList);
}

function summCart()
{
    $cartList = getCartList();
    $summCart= 0;
    foreach ($cartList as $itemProduct) {
        $summCart += $itemProduct['price'] * $itemProduct['quantity'];
    }
    return $summCart;
}


function addToCart()
{
    $session = session_id();
    $data = json_decode(file_get_contents('php://input'));
    $id_product = $data->id_product;

    executeQuery("INSERT INTO `cart` (`id_session`, `id_product`, `quantity`) VALUES ('{$session}', '{$id_product}', '1');");
    $response = [
        'countCart' => countCart(),
        'summCart' => summCart()
    ];

    header("Content-type: application/json");
    echo json_encode($response);
}

function deleteToCart()
{
    $session = session_id();
    $data = json_decode(file_get_contents('php://input'));
    $id_cart_item = $data->id_cart_item;

    executeQuery("DELETE FROM `cart` WHERE `id` = '{$id_cart_item}' AND id_session = '{$session}';");

    $response = [
        'id_deleted' => $id_cart_item,
        'countCart' => countCart(),
        'summCart' => summCart()

    ];
    header("Content-type: application/json");
    echo json_encode($response);
}

function getCartList()
{
    $session = session_id();
    return getArrayDB("SELECT 
            cart.id AS id_cart_item, id_session, product.id AS id_product, color, price, quantity, `name` 
            FROM cart inner join product on cart.id_product = product.id
            AND id_session = '{$session}';");
}
