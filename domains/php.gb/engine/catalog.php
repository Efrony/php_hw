
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
