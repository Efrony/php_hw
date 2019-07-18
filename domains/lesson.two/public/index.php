<?php
require "../engine/Autoload.php";
require "../config/config.php";

use app\engine\Autoload;
use app\model\Products;

spl_autoload_register([new Autoload, 'load']);

$controllerName = $_GET['c'] ?  : 'products'; // если null то вернет product, если не null, то вернет $_GET['c'] 
$actionName = $_GET['a'];   

$controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName) . "Controller";

if (class_exists($controllerClass)) {
    $controller = new $controllerClass();
    $controller->runAction($actionName);

} else {
    echo '404';
}







