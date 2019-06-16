<?php

include ('../config/config.php');

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'home';
}
switch ($page) {
    case 'home':
        $paramsContent = [
            'title' => 'Home page',
            'imagesCatalog' => imageCatalog(DIR_CATALOG),
            'messageLoad' => imageLoad(DIR_CATALOG)
        ];
        break;
    case 'man':
        $paramsContent = [
            'title' => 'Man'
        ];
        break;
    case 'women':
        $paramsContent = [
            'title' => 'Women'
        ];
        break;

}

echo renderLayout($page, $paramsContent);




