<?php

namespace app\controllers;

use app\model\Products;
use app\model\Cart;
use app\model\Users;

class ApiController extends Controller
{
    public function actionShowmore()
    {
        $data = json_decode(file_get_contents('php://input'));
        $fromProduct = $data->fromProduct;
        $countProduct = $data->countProduct;
        $productList = Products::getLimit($fromProduct, $countProduct);
        $catalog = $this->renderTemplates('catalog', ['productList' => $productList]);
        header("Content-type: text/html; charset=utf-8;");
        echo $catalog;
        die;
    }

    public function actionAddtocart()
    {
        $session = session_id();
        $data = json_decode(file_get_contents('php://input'));
        $id_product = $data->id_product;
        (new Cart($session, $id_product))->insert();
        $response = [
            'countCart' => Cart::countCart(),
            'summCart' => Cart::summCart()
        ];

        header("Content-type: application/json");
        echo json_encode($response);
    }

    public function actionDeletetocart()
    {
        $data = json_decode(file_get_contents('php://input'));
        $id_cart_item = $data->id_cart_item;
        Cart::delete($id_cart_item);

        $response = [
            'id_deleted' => $id_cart_item,
            'countCart' => Cart::countCart(),
            'summCart' => Cart::summCart()
        ];
        header("Content-type: application/json");
        echo json_encode($response);
    }

    public function actionRegistration()
    {
        $data = json_decode(file_get_contents('php://input'));
        $name = $data->name;
        $email = $data->email;
        $password = $data->password;
        $phone = $data->phone;
        if (Users::isRegistred($email)) {
            $message = 'Такой e-mail уже зарегистрирован';
            $classValid =  'invalidForm ';
        } else {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            (new Users($name, $email, $hash, $phone))->insert();

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

    public function actionClearCart(){
        Cart::clearCart();
        $response = ['countCart' => Cart::countCart()];
        header("Content-type: application/json");
        echo json_encode($response);
    }
}
