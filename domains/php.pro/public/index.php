
<?php
include "../engine/Autoload.php";

use app\engine\Autoload;
use app\engine\Db;
use app\model\Products;
use app\model\Users;


spl_autoload_register([new Autoload, 'load']);

(new Products(new Db))->getOneFromDb(1);
(new Users(new Db))->getAllFromDb();


