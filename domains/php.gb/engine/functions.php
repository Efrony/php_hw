<?php

function getParamsTemplate($page)
{
    switch ($page) {
        case 'home':
            $paramsTemplate = [
                'title' => 'Home page',
                'productList' => getProductList(),
                'messageLoad' => imageLoad(DIR_CATALOG),

            ];
            break;
        case 'man':
            $paramsTemplate = [
                'title' => 'Man'
            ];
            break;
        case 'product':
            $paramsTemplate = [
                'title' => 'Product',
                'ratingUP' => ratingUp($_GET['id']),
                'productList' => getProductList(),
                'productItem' => getProductList('id =' . (int)$_GET['id'])[0]
            ];
            break;
    }
    return $paramsTemplate;
}

function getProductList($where = '')
{
    if ($where) {
        $sql = "SELECT * FROM product WHERE {$where} ORDER BY rating DESC;";
    } else {
        $sql = "SELECT * FROM product ORDER BY rating DESC;";
    }   
    $productList = getArrayDB($sql);
    return $productList;
}

function ratingUp($id) {
    $id = (int)$id;
    $sql = "UPDATE `product` SET `rating` =  `rating` + 1 WHERE (`id` = '$id');";
    executeQuery($sql);
}


function renderLayout($page, array $paramsContent = [])
{
    $layout = renderTemplates(LAYOUTS_DIR . 'main', [
        'content' => renderTemplates($page, $paramsContent),
        'header' => renderTemplates('header'),
        'menu' => renderTemplates('menu'),
        'footer' => renderTemplates('footer'),

    ]);
    return $layout;
}

function renderTemplates($page, array $paramsContent = [])
{
    ob_start();
    if (!is_null($paramsContent)) { // если массив не пустой, то переформировать его, создавая переменные с именем ключа 
        foreach ($paramsContent as $key => $value) $$key = $value; // аналог extract() 
    }

    $fileName = TEMPLATES_DIR . "{$page}.php";
    if (file_exists($fileName)) {
        include_once $fileName;
    } else {
        die("Страницы {$fileName} не существует.");
    }
    return ob_get_clean();
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
