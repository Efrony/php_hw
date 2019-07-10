<?php

function twigMonster($page)
{
    Twig_Autoloader::register();
    try {
        $loader = new Twig_Loader_Filesystem(TEMPLATES_DIR);
        $twig = new Twig_Environment($loader);
        $template = $twig->loadTemplate(LAYOUTS_DIR . '/main.tmpl');

        echo $template->render(array(
            'header' => [
                'countCart' => 2,
                'myEmail' => 'admin@admin.ru',
                'isAuth' => true,
            ],
            'title' => getTitle($page),
            'content' => getContent($page, $twig),

        ));
    } catch (Exception $e) {
        die('ERROR: ' . $e->getMessage());
    }
}

function getContent($page, $twig)
{
    switch ($page) {
        case 'women':
            $template = $twig->loadTemplate('women.tmpl');
            $contentTemplate = [
                'productList' => getListProductWithRating(),
            ];
            break;
        case 'product':
            $template = $twig->loadTemplate('product.tmpl');
            $contentTemplate = [
                'ratingUP' => ratingUp($_GET['id']),
                'productList' => getListProductWithRating(),
                'productItem' => getListProductWithID(),
            ];
            break;
        default:
            $template = $twig->loadTemplate('home.tmpl');
            $contentTemplate = [
                'p1' => 'home page content 1',
                'p2' => 'home page content 2'
            ];
            break;
    }

    ob_start();
    echo $template->render(array('contentTemplate' => $contentTemplate));
    return ob_get_clean();
}

function getTitle($page)
{
    switch ($page) {
        case 'women':
            $title = 'WOMEN';
            break;
        case 'product':
            $title = 'PRODUCT';
            break;
        default:
            $title = 'HOME PAGE';
            break;
    }
    return $title;
}
