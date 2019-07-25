<?php

namespace app\controllers;

use app\model\Cart;

class CartController extends Controller
{
    public function actionDefault()
    {
        $cartList = Cart::getCart();
        $countCart = Cart::countCart();
        $summCart = Cart::summCart();
        echo $this->render('cart', ['cartList' => $cartList, 'countCart' => $countCart, 'summCart' => $summCart]);
    }

    public function actionSendOrder()
    {
        if (isset($_POST['sendOrder'])) {
            $phone = $_POST['phone'];
            if ($phone == '') {
                $message = 'Вы не указали телефон';
                header("Location: /cart/default/?phonemessage={$message}");
                die;
            }
            $country = $_POST['country'];
            $state = $_POST['state'];
            $zip = $_POST['zip'];
            $name = $_POST['name'];

            $cartList = Cart::getCart();
            $address = `{$country} {$state} {$zip}`;
            header("Location: /cart/");
        }
    }
}
