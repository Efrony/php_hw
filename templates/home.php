home page
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
    if ($i == 0) echo "{$i} – это ноль<br>";
    elseif ($i & 1) echo "{$i} – нечётное число<br>";
    else echo "{$i} – чётное число<br>";
    $i++;
} while ($i <= 10);

//-------------------------------- ЗАДАНИЕ 3
echo "<br><br>ЗАДАНИЕ 3 <br>";
$provinces = [
    'Московская область' => ['Москва', 'Зеленоград', 'Клин'],
    'Ленинградская область' => ['Санкт-Петербург', 'Всеволожск', 'Павловск', 'Кронштадт']
];

foreach ($provinces as $province => $cities) {
    echo "{$province}:<br>";
    foreach ($cities as $city) {
        if ($cities[count($cities) - 1] == $city) echo "{$city}.";
        else echo "{$city}, ";
    }
    echo "<br>";
}

//-------------------------- ЗАДАНИЕ 4
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
        'э' => 'e', 'ю' => 'yu', 'я' => 'ya'
    ];
    for ($i = 0; $i < mb_strlen($str); $i++) {
        $сut = mb_substr($str, $i, 1);
        if (array_key_exists($сut, $abc)) {
            $strTrans .= $abc[$сut];
        } else {
            if (array_key_exists(mb_strtolower($сut), $abc)) {
                $сut = mb_strtolower($сut);
                $strTrans .= strtoupper($abc[$сut]);
            } else {
                $strTrans .= $сut;
            }
        }
    }
    return $strTrans;
}
echo transliteration('Хэй хэй! Как твои дела? - Отлично! А как твои?? 100 лет не виделись...');

//--------------------------  ЗАДАНИЕ 5
echo "<br><br>ЗАДАНИЕ 5 <br>";
function spaceText($str)
{
    $strSpace = '';
    for ($i = 0; $i < mb_strlen($str); $i++) {
        $сut = mb_substr($str, $i, 1);
        if ($сut == ' ') {
            $strSpace .= '_';
        } else {
            $strSpace .= $сut;
        }
    }
    return $strSpace; // аналог -  return str_replace(' ', '_',$str);
}
echo spaceText('Хэй хэй! Как твои дела? - Отлично! А как твои?? 100 лет не виделись...');

//-------------------------------- ЗАДАНИЕ 6
echo "<br><br>ЗАДАНИЕ 6 <br>";
$mounths = [
    'Январь' => ['Неделя 1', 'Неделя 2', 'Неделя 3','Неделя 4'], 
    'Февраль' => ['Неделя 5', 'Неделя 6', 'Неделя 7','Неделя 8', 'Неделя 9' => ['День 25', 'День 26', 'День 27', 'День 28']],
    'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь']; 

function renderList($list, $linkStory = '') {
    $render = '<ul style="margin-left: 20px">';
    foreach ($list as $head => $string) {
        if (is_array($string)) {
            $link = $linkStory . "/" . transliteration_($head);
            $render .= '<li><a href=' . $link . '>' . $head . '</a></li>';
            $render .= renderList($string, $link);
        } else {
            $link = $linkStory . "/" . transliteration_($string);
            $render .= '<li><a href=' . $link . '>' . $string . '</a></li>';
        }
    }

    $render .= '</ul>'; 
    return $render;
}

echo renderList($mounths);

/* ------  старый вариант
<ul>
    <?php foreach ($mounths as $mounth) : ?>
        <li><?= $mounth ?></li>
    <?php endforeach; ?>
</ul>
*/


 //-------------------------------- ЗАДАНИЕ 7
echo "<br><br>ЗАДАНИЕ 7 <br>";
for ($i = 0; $i < 10; print($i++)) { }

//-------------------------------- ЗАДАНИЕ 8
echo "<br><br>ЗАДАНИЕ 8 <br>";

<?php
$provinces = [
    'Московская область' => ['Москва', 'Клин', 'Зеленоград', 'Козинск'],
    'Ленинградская область' => ['Санкт-Петербург', 'Всеволожск', 'Павловск', 'Кронштадт']
];

echo "<br><br>ЗАДАНИЕ 8 <br>";

function cityList($provinces) {
	$list ='';
	foreach ($provinces as $province => $cities) {
		$list .= "<br>{$province}:<br>";
    	foreach ($cities as $city) {
        	if (mb_substr($city, 0, 1) == 'К') {
				$list .= "$city, ";	
        	}
    	}
		
		$list = substr_replace($list, '.', -2);
	}
	echo $list; 
}

cityList($provinces);

//-------------------------------- ЗАДАНИЕ 9

echo "<br><br>ЗАДАНИЕ 9 <br>";
function transliteration_($str)
{   
    $strTrans = '';
    $abc = [
        'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd',
        'е' => 'e', 'ё' => 'yo', 'ж' => 'zh', 'з' => 'z', 'и' => 'i',
        'й' => 'y', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n',
        'о' => 'o', 'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't',
        'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c', 'ч' => 'ch',
        'ш' => 'sh', 'щ' => 'shch', 'ъ' => "'", 'ы' => 'y', 'ь' => "'",
        'э' => 'e', 'ю' => 'yu', 'я' => 'ya'
    ];
    for ($i = 0; $i < mb_strlen($str); $i++) {
        $сut = mb_substr($str, $i, 1);
        if (array_key_exists($сut, $abc)) {
            $strTrans .= $abc[$сut];
        } else {
            if (array_key_exists(mb_strtolower($сut), $abc)) {
                $сut = mb_strtolower($сut);
                $strTrans .= strtoupper($abc[$сut]);
            } else {
                $strTrans .= $сut;
            }
        }
    }
    return str_replace(' ', '_',$strTrans);
}
echo transliteration_('Хэй хэй! Как твои дела? - Отлично! А как твои?? 100 лет не виделись...');
