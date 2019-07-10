<?php
include('../config/config.php');
$url_array = explode("/", $_SERVER['REQUEST_URI']);

if ($url_array[1] == '') {
    $page = 'home';
} else {
    $page = $url_array[1];
}

session_start();
twigMonster($page);

