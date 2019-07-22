<?php

namespace app\model;

use app\engine\Db;

class Cart extends DbModel
{
    public $id;
    public $id_session;
    public $id_product;

    public function __construct($id_session = null, $id_product = null)
    {
        $this->id_session = $id_session;
        $this->id_product = $id_product;
    }

    public function getCart()
    {
        $sql = "SELECT 
        cart.id AS id_cart_item, id_session, product.id AS id_product, color, price, quantity, `name`, `img_id`
        FROM cart inner join product on cart.id_product = product.id
        AND id_session = :id_session;";
        return Db::getInstance()->queryAll($sql, ['id_session' => session_id()]);
    }

    public static function countCart()
    {
        $id_session = session_id();
        $cartList = Cart::getWhere('id_session', $id_session);
        return count($cartList);
    }

    public static function summCart()
    {
        $cartList = Cart::getCart();
        $summCart = 0;
        foreach ($cartList as $itemProduct) {
            $summCart += $itemProduct['price'] * $itemProduct['quantity'];
        }
        return $summCart;
    }


    public static function getNameTable()
    {
        return 'cart';
    }
}
