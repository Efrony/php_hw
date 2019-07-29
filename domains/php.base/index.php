
<?php
include "../engine/Autoload.php";

use app\engine\Autoload;
use app\model\products\DigitalProduct;
use app\model\products\PieceProduct;
use app\model\products\WeightProduct;

spl_autoload_register([new Autoload, 'load']);


$piece_product = new PieceProduct(1, 'Electronic Book', ['type' => 'Book'], 40, 'EA');
echo ($piece_product->getSummPrice());
echo '<br>';
echo ($piece_product->getSummPrice());
echo '<br> Cумма:';
echo ($piece_product->summ);
echo '<br>';
echo '<br>';

$digital_product = new DigitalProduct(2, 'Electronic Book', ['type' => 'El_Book'], 40, 'EA');
echo ($digital_product->getSummPrice());
echo '<br> Cумма:';
echo ($digital_product->summ);
echo '<br>';
echo '<br>';

$weight_product = new WeightProduct(3, 'Many Books', ['type' => 'KG_Book'], 40, 'EA');
echo ($weight_product->getSummPrice(2));
echo '<br>';
echo ($weight_product->getSummPrice(1));
echo '<br> Cумма:';
echo ($weight_product->summ);
echo '<br>';
echo '<br>';



$host = '127.0.0.1';
$db   = 'shop';
$user = 'root';
$pass = '';
$charset = 'utf8';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // fetch(PDO::FETCH_ASSOC)) fetch(PDO::FETCH_LAZY))
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, $user, $pass, $opt);



echo  "<br> ================================ БЕЗ передачи переменной <br>";
$stmt = $pdo->query('SELECT * FROM comments');
while ($row = $stmt->fetch()) {
    echo $row['name'] . "<br>";
    echo $row['text'] . "<br>";
    echo  "<br>";
}



echo  "<br>";
echo  "<br> ================================= С передачей переменной <br>";
$sql = 'SELECT name FROM users WHERE email = ?';
$sql = 'SELECT name FROM users WHERE email = :email';

$email = 'admin@admin.com';

$stmt = $pdo->prepare('SELECT name FROM users WHERE email = ?');
$stmt->execute(array($email));
foreach ($stmt as $row)
{
    echo $row['name'] . "<br>";
}
echo  "<br>";
echo  "<br>";

$stmt = $pdo->prepare('SELECT name FROM users WHERE email = :email');
$stmt->execute(array('email' => $email));
foreach ($stmt as $row)
{
    echo $row['name'] . "<br>";
}


echo  "<br>";
echo  "<br> ================================= <br>";
/*Мы уже выше познакомились с методом fetch(), который служит для последовательного получения строк из БД.
Этот метод является аналогом функции mysq_fetch_array() и ей подобных, но действует по-другому:
вместо множества функций здесь используется одна, но ее поведение задается переданным параметром. 
В подробностях об этих параметрах будет написано позже,
а в качестве краткой рекомендации посоветую применять fetch() в режиме FETCH_LAZY: */

$email = 'efron.vit@gmail.com';
$stmt = $pdo->prepare('SELECT name FROM users WHERE email = ?');
$stmt->execute(array($email));
while ($row = $stmt->fetch(PDO::FETCH_LAZY))
{
    echo $row[0] . "<br>";
    echo $row['name'] . "<br>";
    echo $row->name . "<br>";
}
//В этом режиме не тратится лишняя   память, и к тому же к колонкам можно обращаться любым из трех способов 
//- через индекс, имя, или свойство.


echo  "<br>";
echo  "<br> ================================= fetchColumn <br>";
/*акже у PDO statement есть функция-хелпер для получения значения единственной колонки. 
Очень удобно, если мы запрашиваем только одно поле - в этом случае значительно сокращается количество писанины: */
$id = 47;
$stmt = $pdo->prepare("SELECT name FROM users WHERE id=?");
$stmt->execute(array($id));
$name = $stmt->fetchColumn();
echo $name;


echo  "<br> ================================= fetchAll <br>";
/*
fetchAll() возвращает массив, который состоит из всех строк, которые вернул запрос. Из чего можно сделать два вывода:
1. Эту функцию не стоит применять тогда, когда запрос возвращает много данных. В таком случае лучше использовать традиционный цикл с fetch()
2. Поскольку в современных РНР приложениях данные никогда не выводятся сразу по получении, 
а передаются для этого в шаблон, fetchAll() становится просто незаменимой, позволяя не писать циклы вручную, 
и тем самым сократить количество кода.

Получение простого массива. 
Вызванная без параметров, эта функция возвращает обычный индексированный массив, в котором лежат строки из бд, 
в формате, который задан в FETCH_MODE по умолчанию. Константы PDO::FETCH_NUM, PDO::FETCH_ASSOC, PDO::FETCH_OBJ могут менять формат на лету.
*/

/*
Получение колонки.
Иногда бывает нужно получить простой одномерный массив, запросив единственное поле из кучи строк. 
Для этого используется режим PDO::FETCH_COLUMN возвращает одно поле в виде строки*/
echo  "<br>";
echo  "<br> ================================= fetchAll Получение колонки <br>";
$data = $pdo->query('SELECT name FROM users')->fetchAll(PDO::FETCH_COLUMN);
echo $data[0] . "<br>";
echo $data[1] . "<br>";
echo $data[2] . "<br>";

echo  "<br>";
echo  "<br> ================================= fetchAll Получение пар ключ-значение. <br>";
/*Получение пар ключ-значение.
Также востребованный формат, когда желательно получить ту же колонку, но индексированную не числами, а одним из полей.
 За это отвечает константа PDO::FETCH_KEY_PAIR. 
 */
$data = $pdo->query('SELECT id, name FROM users')->fetchAll(PDO::FETCH_KEY_PAIR);

foreach ($data as $key => $value) {
    echo '$data['.$key.']' . ' = '. $value;
    echo  "<br>";
}
//Следует помнить, что первой в колонкой надо обязательно выбирать уникальное поле.



echo  "<br>";
echo  "<br> ================================= Получение всех строк, индексированных полем.. <br>";
/*Получение всех строк, индексированных полем.
Также часто бывает нужно получить все строки из БД, но также индексированные не числами,
 а уникальным полем. Это делает константа PDO::FETCH_UNIQUE*/
 $data = $pdo->query('SELECT * FROM users')->fetchAll(PDO::FETCH_UNIQUE);
 foreach ($data as $key => $value) {
    echo '$data['.$key.']' . ' = '. $value;
    echo  "<br>";
    foreach ($value as $key1 => $value1) {
        echo '_____$data_inside['.$key1.']' . ' = '. $value1;
        echo  "<br>";
    }
}