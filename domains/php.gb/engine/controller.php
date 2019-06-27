<?php
function getParamsTemplate($page)
{
    switch ($page) {
        case 'header':
        $paramsTemplate = [
            'countCart' => countCart()
        ];
        break;
        case 'home':
            $paramsTemplate = [
                'title' => 'HOME PAGE',
            ];
            break;
        case 'women':
            $paramsTemplate = [
                'title' => 'WOMEN',
                'productList' => getArrayDB("SELECT * FROM `product` ORDER BY `rating` DESC;"),
                'messageLoad' => imageLoad(DIR_CATALOG),

            ];
            break;
        case 'product':
            if (isset($_GET['action'])) {
                doFeedbackAction();
            }
            $paramsTemplate = [
                'title' => 'PRODUCT',
                'ratingUP' => ratingUp($_GET['id']),
                'productList' => getArrayDB("SELECT * FROM `product` ORDER BY `rating` DESC;"),
                'productItem' => getArrayDB("SELECT * FROM `product`  WHERE id =" . getIdProduct())[0],
                'commentsList' => getArrayDB("SELECT * FROM `comments` WHERE id_product =" . getIdProduct()),
                'messageComment' => messageComment(),
                'selectedComment' => editComment(),
            ];
            break;
        case 'about_us':
            if (isset($_GET['action'])) {
                doFeedbackAction();
            }
            $paramsTemplate = [
                'title' => 'ABOUT US',
                'commentsList' => getArrayDB("SELECT * FROM `comments`"),
                'messageComment' => messageComment(),
                'selectedComment' => editComment(),
            ];
            break;
        case 'my_account':
            $paramsTemplate = [
                'title' => 'MY ACCOUNT',
            ];
            break;
        case 'cart':
        $paramsTemplate = [
            'title' => 'CART',
            'cartList' => getArrayDB("SELECT 
            cart.id AS id_cart_item, id_session, product.id AS id_product, color, price, quantity, `name` 
            FROM cart inner join product on cart.id_product = product.id;")
        ];
            break;
        case 'api':
            if ($_GET['action'] === 'addToCart') {
                addToCart();
            }
            if ($_GET['action'] === 'deleteToCart') {
                deleteToCart();
            }
            die;

    }
    return $paramsTemplate;
}



function imageLoad($dirCatalog)
{
    if (isset($_POST['loadbutton'])) {
        if ($_FILES['loadfile']['type'] == 'image/jpeg'  && $_FILES['loadfile']['size'] <= 2000000) {
            $name = $_FILES['loadfile']['name'];
            $path = $dirCatalog . $name;
            if (move_uploaded_file($_FILES['loadfile']['tmp_name'], $path)) {
                $message = "Файл загружен. Перезагрузите страницу";
                executeQuery("INSERT INTO `product` (`name`, `rating`) VALUES ('{$name}', '0');");
            } else {
                $message = "Ошибка загрузки";
            }
        } else {
            $message = "Файл не соответсвует требованиям";
        }
    }
    //header("Location: index.php/?messageLoad={$message}");
    //exit();
    return $message;
}
