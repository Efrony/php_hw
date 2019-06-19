<?php
function connectDB()
{
    static $sqlConnect = null;
    if (is_null($sqlConnect)) {
        $sqlConnect = @mysqli_connect(HOST, USER, PASSWORD, DATABASE)
            or die("Ошибка соединения с БД" . mysqli_connect_error());
    }
    return $sqlConnect;
}

function getArrayDB($query) {
    $link = connectDB();
    $result = @mysqli_query($link, $query) or die(mysqli_error($link));
    $result_array = [];
    foreach ($result as $row) {
        $result_array[] = $row;
    }
    return $result_array;
}

function generateDB($dirCatalog) {  // единоразовый вызов
    $productList = scandir($dirCatalog);  // сканирование дирректории
    $productList = array_slice($productList, 2); //  unset($imagesCatalog[0], $imagesCatalog[1]) удаление точек
    foreach ($productList as $item) {
        mysqli_query(connectMysql(), "INSERT INTO `product` (`name`, `rating`) VALUES ('{$item}', '0');");
    }
}

// 
 