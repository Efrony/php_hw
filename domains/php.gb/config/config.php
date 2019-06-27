<?php
define("TEMPLATES_DIR", "../templates/");
define("LAYOUTS_DIR", "./layouts/");
define ("DIR_CATALOG", "./img/catalog/");

/* DB config */
define("HOST", 'localhost');
define("DATABASE", 'shop');
define("USER", 'root');
define("PASSWORD", '');


include ('../engine/functions.php');
include ('../engine/render.php');
include ('../engine/db.php');
include ('../engine/calculate.php');
include ('../engine/comments.php');
include ('../engine/cart.php');
include ('../engine/auth.php');

