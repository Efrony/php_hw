<?php 
function renderLayout($page, array $paramsContent = []) {
    $layout = renderTemplates(LAYOUTS_DIR . 'main', [
        'content' => renderTemplates($page, $paramsContent),
        'header' => renderTemplates('header'),
        'menu' => renderTemplates('menu'),
        'subscribe' => renderTemplates('subscribe'),
        'footer' => renderTemplates('footer'),
        /* не знаю, правильно ли дробить шаблон на такие элементы в 
        папке templates или они должны лежaть в какой-то подпапке?
        Что если я хочу создать отдельный блок catalog, который будет отрисовывать товары в нужном мне месте?
        Правильно ли в таком случае создавать в папке templates файл catalog.php, а потом 
        через renderTemplates передавать его в нужную страницу через переменную $catalog?
        */
    ]);
    return $layout;
}

function renderTemplates($page, array $paramsContent = []){
    ob_start();
    if (!is_null($paramsContent)) { // если массив не пустой, то переформировать его, создавая переменные с именем ключа 
        foreach ($paramsContent as $key => $value) $$key = $value; // аналог extract() 
    }

    $fileName = TEMPLATES_DIR . "{$page}.php";
    if (file_exists($fileName)) {
        include_once $fileName;
    } else {
        Die("Страницы {$fileName} не существует.");
    }
    return ob_get_clean();
}

function imageCatalog($dirCatalog) {
    $imagesCatalog = scandir($dirCatalog);  // сканирование дирректории
    $imagesCatalog = array_slice($imagesCatalog, 2); //  unset($imagesCatalog[0], $imagesCatalog[1]) удаление точек
    return $imagesCatalog;
}

function imageLoad($dirCatalog) {
    if (isset($_POST['loadbutton'])) {
        /* В этом задании не совсем понял как можно очистить массив $_FILES. 
    После перезагрузки страницы  массив хранит данные о загруженном файле. 
    А header перезагружает страницу, и сообщения об успешной или не успешной загрузке файла на странице не видно. 
    Так же не понятнозачем нужен exit() после header как в примере на уроке */
        if ($_FILES['loadfile']['type'] == 'image/jpeg'  && $_FILES['loadfile']['size'] <= 2000000) {
            $path = $dirCatalog . $_FILES['loadfile']['name'];
            if (move_uploaded_file($_FILES['loadfile']['tmp_name'], $path)) {
                $message = "<br>Файл загружен<br>";
            } else {
                $message = "<br>Ошибка загрузки<br>";
            }
        } else {
            $message = "<br>Файл не соответсвует требованиям<br>";
        }
    }
    return $message;
}
?>