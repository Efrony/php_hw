<?php function getIdProduct()
{
    $url_product = explode("/", $_SERVER['REQUEST_URI']);
    return $url_product[2];
}


function ratingUp($id)
{
    $id = (int)$id;
    $sql = "UPDATE `product` SET `rating` =  `rating` + 1 WHERE (`id` = '{$id}');";
    executeQuery($sql);
}

function getListProductWithRating()
{
    return getArrayDB("SELECT * FROM `product` ORDER BY `rating` DESC;");
}

function getListProductWithID()
{
    return getArrayDB("SELECT * FROM `product`  WHERE id =" . getIdProduct())[0];
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