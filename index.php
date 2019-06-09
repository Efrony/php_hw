<?php  

function renderTemplates($page, $content = ''){
    ob_start();
    include "templates/{$page}.php";
    return ob_get_clean();
}

$content = renderTemplates("home_work");
echo renderTemplates("main", $content);
