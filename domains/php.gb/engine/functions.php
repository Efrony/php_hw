<?php
function getParamsTemplate($page)
{
    switch ($page) {

        case 'home':
            $paramsTemplate = [
                'title' => 'HOME PAGE',
                'resultCalculate' => resultCalculate(),
            ];
            break;
        case 'women':
            $paramsTemplate = [
                'title' => 'WOMEN',
                'productList' => getListDB('product', 'ORDER BY `rating` DESC'),
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
                'productList' => getListDB('product', 'ORDER BY `rating` DESC'),
                'productItem' => getListDB('product', 'WHERE id =' . getIdProduct())[0],
                'commentsList' => getListDB('comments', 'WHERE id_product =' . getIdProduct()),
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
                'commentsList' => getListDB('comments'),
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
            ];
            break;
        case 'api':
            if ($_GET['action'] == 'addToCart') {
                echo('dsadsadsadasdddddddddddddddddddddddddddddddddddd');
            }
            if ($_GET['action'] == 'calculate') {
                $data = json_decode(file_get_contents('php://input'));
                $result = calculate($data->firstNumber, $data->secondNumber, $data->operator);
                $response = [
                    'result' => $result
                ];
    
                header("Content-type: application/json");
                echo json_encode($response);
            }
    }
    return $paramsTemplate;
}

function getIdProduct()
{
    $url_product = explode("/", $_SERVER['REQUEST_URI']);
    return $url_product[2];
}

function getListDB($table, $addition = '')
{
    $sql = "SELECT * FROM `{$table}` {$addition};";
    $list = getArrayDB($sql);
    return $list;
}

function ratingUp($id)
{
    $id = (int)$id;
    $sql = "UPDATE `product` SET `rating` =  `rating` + 1 WHERE (`id` = '$id');";
    executeQuery($sql);
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
