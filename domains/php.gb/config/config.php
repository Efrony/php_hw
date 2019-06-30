<?php
define("TEMPLATES_DIR", "../templates/");
define("LAYOUTS_DIR", "./layouts/");
define ("DIR_CATALOG", "./img/catalog/");

/* DB config */
define("HOST", 'localhost');
define("DATABASE", 'shop');
define("USER", 'root');
define("PASSWORD", '');


include ('../engine/controller.php');
include ('../engine/render.php');
include ('../engine/db.php');
include ('../engine/catalog.php');
include ('../engine/comments.php');
include ('../engine/login.php');
include ('../engine/cart.php');
include ('../engine/registration.php');

