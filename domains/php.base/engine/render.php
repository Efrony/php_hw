<?php 
function renderLayout($page, array $paramsContent = [])
{
    $layout = renderTemplates(LAYOUTS_DIR . 'main', [
        'content' => renderTemplates($page, $paramsContent),
        'header' => renderTemplates('header', getParamsTemplate('header')),
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