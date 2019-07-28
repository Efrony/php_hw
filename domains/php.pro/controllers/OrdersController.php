<?php


namespace app\controllers;

use app\model\Cart;
use app\model\Orders;
use app\model\Products;
use app\model\Users;

class OrdersController extends Controller
{
    public function actionDefault()
    {
        $ordersList = Orders::getAll();
        echo $this->render('orders', ['ordersList' => $ordersList]);
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
            $email = Users::getUser();
            $address = $_POST['country'] .' '. $_POST['state'] .' '. $_POST['zip'];
            $session = session_id();
            $orderProducts = Cart::getColumnWhere('id_product', 'id_session', $session);
            $orderProducts = implode(';', $orderProducts);
            $name = $_POST['name'];
            $summCart = Cart::summCart();

            $newOrder = new Orders($email, $address, $phone, $session, $orderProducts, $name, $summCart);
            $newOrder->insert();

            Cart::clearCart();
            $orderMessage = $newOrder->id;
            header("Location: /cart/default/?orderMessage={$orderMessage}");
        }
    }

}