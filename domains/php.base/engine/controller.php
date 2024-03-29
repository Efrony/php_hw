<?php
function getParamsTemplate($page)
{
    session_start();
    switch ($page) {
        case 'header':
            if (isset($_GET['exit'])) {
                logout();
            }
            $paramsTemplate = [
                'countCart' => countCart(),
                'myEmail' => getUser(),
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
                'productList' => getListProductWithRating(),
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
                'productList' => getListProductWithRating(),
                'productItem' => getListProductWithID(),
                'commentsList' =>  getListCommentsWithID(),
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
                'commentsList' => getListComments(),
                'messageComment' => messageComment(),
                'selectedComment' => editComment(),
            ];
            break;
        case 'my_account':
            if (isset($_POST['loginButton'])) {
                login();
            }
            $paramsTemplate = [
                'title' => 'MY ACCOUNT',
            ];
            break;
        case 'cart':
            $paramsTemplate = [
                'title' => 'CART',
                'cartList' => getCartList()
            ];
            break;
        case 'api':
            if ($_GET['action'] === 'addToCart') {
                addToCart();
            }
            if ($_GET['action'] === 'deleteToCart') {
                deleteToCart();
            }
            if ($_GET['action'] === 'registration') {
                registration();
            }
            die;
        case 'my_ccount':
            if (isset($_POST['loginButton'])) {
                login();
            }
            $paramsTemplate = [
                'title' => 'MY ACCOUNT',
            ];
            break;
    }
    return $paramsTemplate;
}
