<?php
/* не понятно как здесь использовать __DIR__ , ведь он приводит в папку config */

define("TEMPLATES_DIR", "../templates/");
define("LAYOUTS_DIR", "./layouts/");
define ("DIR_CATALOG", "./img/catalog/");

/* DB config */
define("HOST", 'localhost');
define("DATABASE", 'shop');
define("USER", 'root');
define("PASSWORD", '');

include ('../engine/functions.php');
include ('../engine/db.php');