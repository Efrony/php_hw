<?php

include ('../config/config.php');

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'home';
}
// generateDB(DIR_CATALOG); 
$paramsTemplate = getParamsTemplate($page);
echo renderLayout($page, $paramsTemplate);




