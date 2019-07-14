<?php 
function showMore()
{
    $data = json_decode(file_get_contents('php://input'));
    $fromProduct = $data->fromProduct;
    $countProduct = $data->countProduct;

    $newProducts = getArrayDB("SELECT * FROM `product` ORDER BY `rating` DESC LIMIT $fromProduct, $countProduct;");

    header("Content-type: text/html; charset=utf-8;");
    ob_start();

    foreach ($newProducts as $itemProduct) {
    $showNewProducts = '
    <a href="/product/' . $itemProduct['id'] . '/?id=' . $itemProduct['id'] . '">
        <figure class="productItem">
            <img src="/' . DIR_CATALOG . $itemProduct['img_id'] . '.jpg" alt="productFoto">
            <div class="shadowHover">
                <button onclick="return false" class="addToCart" data-id="' . $itemProduct['id'] . '">&ensp;Add to Cart</button>
            </div>
            <figcaption>' . $itemProduct['color'] . ' ' . $itemProduct['name'] .
                '<p>$' . $itemProduct['price'] . '</p>
                <i class="fa fa-eye" aria-hidden="true"></i><span class="raring"> ' . $itemProduct['rating'] . '</span>
            </figcaption>
        </figure>
    </a>';
    echo $showNewProducts;
    }
    
   // ob_get_clean();
}

function getIdProduct()
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
    return getArrayDB("SELECT * FROM `product` ORDER BY `rating` DESC LIMIT 0,24;");
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