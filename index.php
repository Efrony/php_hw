<?php  

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'home';
}
switch ($page) {
    case 'home':
        $paramsContent = [
            'title' => 'Home page',
            'content' => renderContent('home')
        ];
        break;
    case 'man':
        $paramsContent = [
            'title' => 'Man',
            'content' => renderContent('man')
        ];
        break;
    case 'women':
        $paramsContent = [
            'title' => 'Women',
            'content' => renderContent('women')
        ];
        break;

}

echo renderLayout($page, $paramsContent);

function renderLayout($page, array $paramsContent = []) {
    $layout = renderContent('./layouts/main', ['content' => renderContent($page, $paramsContent)]);
    return $layout;
}

function renderContent($page, array $paramsContent = []){
    ob_start();
    if (!is_null($paramsContent)) { // если массив не пустой, то переформировать его, создавая переменные с именем ключа 
        foreach ($paramsContent as $key => $value) $$key = $value; // аналог extract() 
    }

    $fileName = "./content/{$page}.php";
    if (file_exists($fileName)) {
        include $fileName;
    } else {
        Die("Страницы {$fileName} не существует.");
    }
    
    return ob_get_clean();
}

