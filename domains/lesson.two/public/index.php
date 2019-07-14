
<?php
include "../engine/Autoload.php";

use app\engine\Autoload;
use app\model\products\DigitalProduct;
use app\model\products\PieceProduct;
use app\model\products\WeightProduct;

spl_autoload_register([new Autoload, 'load']);


$piece_product = new PieceProduct(1,'Electronic Book', ['type'=>'Book'], 40, 'EA');
echo($piece_product->getSummPrice()); 
echo '<br>';
echo($piece_product->getSummPrice());
echo '<br> Cумма:';
echo($piece_product->summ);
echo '<br>';
echo '<br>';

$digital_product = new DigitalProduct(2,'Electronic Book', ['type'=>'El_Book'], 40, 'EA');
echo($digital_product->getSummPrice());
echo '<br> Cумма:';
echo($digital_product->summ);
echo '<br>';
echo '<br>';

$weight_product = new WeightProduct(3,'Many Books', ['type'=>'KG_Book'], 40, 'EA');
echo($weight_product->getSummPrice(2));
echo '<br>';
echo($weight_product->getSummPrice(1));
echo '<br> Cумма:';
echo($weight_product->summ);
echo '<br>';
echo '<br>';


//(new DigitalProduct(new Db))->getOneFromDb(1);


