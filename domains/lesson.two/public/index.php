<?php
require "../engine/Autoload.php";
require "../config/config.php";

use app\engine\Autoload;

spl_autoload_register([new Autoload, 'load']);

$url_array = explode("/", $_SERVER['REQUEST_URI']);

$controllerName = $url_array[1] ?  : 'index'; // если null то вернет product, если не null, то вернет $_GET['c'] 
$actionName = $url_array[2];

$controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName) . "Controller";

if (class_exists($controllerClass)) {
    $controller = new $controllerClass();
    $controller->runAction($actionName);
} else {
    echo 'no controller';
}







