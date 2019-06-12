<?php  //-------------------------------- ЗАДАНИЕ 1
echo "<br><br>ЗАДАНИЕ 1<br>";
$i = 0;
while ($i <= 100) {
    if ($i % 3 == 0) echo $i . ' ';
    $i++;
}

//-------------------------------- ЗАДАНИЕ 2
echo "<br><br>ЗАДАНИЕ 2<br>";
$i = 0;
do {
    if ($i == 0) echo "$i – это ноль<br>";
    elseif ($i % 2 == 0) echo "$i – чётное число<br>";
    else echo "$i – нечётное число<br>";
    $i++;
} while ($i <= 10);

//-------------------------------- ЗАДАНИЕ 3
echo "<br><br>ЗАДАНИЕ 3 <br>";
$provinces = [];
$provinces['Московская область'] = ['Москва', 'Зеленоград', 'Клин'];
$provinces['Ленинградская область'] = ['Санкт-Петербург', 'Всеволожск', 'Павловск', 'Кронштадт'];

foreach ($provinces as $province => $cities) {
    echo "$province:<br>";
    foreach ($cities as $city) {
        if ($cities[count($cities) - 1] == $city) echo "$city.";
        else echo "$city, ";
    }
    echo "<br>";
}

//-------------------------- ЗАДАНИЕ 4, ЗАДАНИЕ 5, ЗАДАНИЕ 9
echo "<br><br>ЗАДАНИЕ 4 <br>";
function transliteration($str)
{
    $strTrans = '';
    $abc = [
        'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd',
        'е' => 'e', 'ё' => 'yo', 'ж' => 'zh', 'з' => 'z', 'и' => 'i',
        'й' => 'y', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n',
        'о' => 'o', 'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't',
        'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c', 'ч' => 'ch',
        'ш' => 'sh', 'щ' => 'shch', 'ъ' => "'", 'ы' => 'y', 'ь' => "'",
        'э' => 'e', 'ю' => 'yu', 'я' => 'ya', ' ' => '_'
    ];
    for ($i = 0; $i < mb_strlen($str); $i++) {
        $сut = mb_substr($str, $i, 1);
        if (array_key_exists($сut, $abc)) $strTrans .= $abc[$сut];
        else $strTrans .= $сut;
    }
    return $strTrans;
}
echo transliteration('хэй хэй ! Как твои дела?');

//--------------------------  ЗАДАНИЕ 5

function spaceText($str){
    $strSpace = '';
    for ($i = 0; $i < mb_strlen($str); $i++) {
        $сut = mb_substr($str, $i, 1);
        if ($сut==' ') $strSpace .= '_';
        else $strSpace .= $сut;
    }
    return $strSpace;
}
echo spaceText('хэй хэй ! Как твои дела?');

//-------------------------------- ЗАДАНИЕ 6
echo "<br><br>ЗАДАНИЕ 5 <br>";
$mounths = ['Январь', 'Февраль', 'Март', 'Апрель', 'Июнь', 'Июль', 'Август']
?>
<ul>
    <?php foreach ($mounths as $mounth) : ?>
    <li><?= $mounth ?></li>
    <?php endforeach; ?>
</ul>



<?php //-------------------------------- ЗАДАНИЕ 7
echo "<br><br>ЗАДАНИЕ 7 <br>";
for ($i = 0; $i < 10; print($i++)) { }

//-------------------------------- ЗАДАНИЕ 8
echo "<br><br>ЗАДАНИЕ 8 <br>";
$provinces = [];
$provinces['Московская область'] = ['Москва', 'Зеленоград', 'Клин'];
$provinces['Ленинградская область'] = ['Санкт-Петербург', 'Всеволожск', 'Павловск', 'Кронштадт'];

foreach ($provinces as $province => $cities) {
    echo "$province:<br>";
    foreach ($cities as $city) {
        if (mb_substr($city, 0, 1) == 'К') {
            if ($cities[count($cities) - 1] == $city) echo "$city.";
            else echo "$city, ";
        }
    }
    echo "<br>";
}
