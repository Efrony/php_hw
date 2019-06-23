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
            $paramsTemplate = [
                'title' => 'PRODUCT',
                'ratingUP' => ratingUp($_GET['id']),
                'productList' => getListDB('product', 'ORDER BY `rating` DESC'),
                'productItem' => getListDB('product', 'WHERE id =' . (int)$_GET['id'])[0]
            ];
            break;
        case 'about_us':
            $paramsTemplate = [
                'title' => 'ABOUT US',
                'commentsList' => getListDB('comments'),
                'messageComment' => messageComment()
            ];
            break;
    }
    return $paramsTemplate;
}

function postComment(){
    $nameComment = mysqli_real_escape_string(getDB(), (string)htmlspecialchars(strip_tags($_POST['nameComment'])));
    $emailComment = mysqli_real_escape_string(getDB(), (string)htmlspecialchars(strip_tags($_POST['emailComment'])));
    $textComment = mysqli_real_escape_string(getDB(), (string)htmlspecialchars(strip_tags($_POST['textComment'])));
    $dateComment = date('Y') . '-' . date('m') . '-' .  date('d') . ' ' . date('H') . ':' . date('i') . ':' . date('d');
    $sql = "INSERT INTO `comments` (`text`, `name`, `date`, `email`) VALUES ('{$textComment}', '{$nameComment}', '{$dateComment}', '{$emailComment}');";
    executeQuery($sql);
    header("Location: ?message=OK");
}

function messageComment(){
    if (isset($_GET['message'])) {
        $messageComment = 'Ваш отзыв добавлен!';
    } else {
        $messageComment ='';
    }
    return $messageComment;
}


function getListDB($table, $addition = '')
{
    
    $sql = "SELECT * FROM `{$table}` {$addition};";
    $list = getArrayDB($sql);
    return $list;
}

function ratingUp($id) {
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

