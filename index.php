<?php // ЗАДАНИЕ 3. Объяснить, как работает данный код:
    $a = 5;
    $b = '05';
    var_dump($a == $b);         // true -  потому что == не сравнивает значения по типу данных, string !== int
    var_dump((int)'012345');     // 12345  - строка приводится к целочисленному значению. 
    var_dump((float)123.0 === (int)123.0); //  false - потому что === стравнивает по типу данных float !== int
    var_dump((int)0 === (int)'hello, world'); // true - строка приводится в целочисленный тип данных, т.к. в ней нет первой цифры. она равна 0.
?>

<?php
 // ЗАДАНИЕ 4.
    $title = "HOME PAGE";
    $h1 = '<h1>MY FIRST PHP-CODE</h1>';
    $dateToday = getDate();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title> <?=$title?> </title> 
</head>
<body>
     <?=$h1?><br> <?=$dateToday['year']?>

</body>    
</html>

<?php 
// 5. *Используя только две переменные, поменяйте их значение местами. 
$a = 10;
$b = 20;
$a = $a + $b ; // 30
$b = $a - $b ; // 10
$a = $a - $b ; // 20
?>