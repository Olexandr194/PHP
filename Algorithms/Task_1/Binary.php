<!--Задание 1
В консоли предложить пользователю ввести длину массива (от 10000), заполнить массив случайными числами,
выполнить поиск максимального и минимального элемента и вывести их индексы. Выполнить поиск 2 методами:
Бинарный поиск
Линейный поиск
Вывести время за которое прошел поиск и количество шагов
Нарисовать блок-схему алгоритма.-->

<!doctype html>
<html>
<head>
    <meta charset="UTF-8"
</head>
<body>
<h1>Задайте величину масиву:</h1>
<form action="Binary.php" method="GET">
    <p>Введіть число більше 10000: <input type="number" name="array" value="12000"></p>
    <p><input type="submit" value="Виконати"></p>
</form>
</body>
</html>

<?php

if (isset($_GET['array'])) {
    $array_length = $_GET['array'];
}
$arr = range(1, $array_length,);

function binary_search($arr, $item, $start = 0, $final = null)
{
    if ($final === null){
        $final = count($arr) - 1;
    }
    if ($start > $final){
        return 'Not found';
    }

    $half = (int)(($start + $final) /2);
    var_dump($start);
    var_dump($final);
    echo $half;

    if ($arr[$half] !== $item){
        if ($arr[$half] < $item){
            $start = $half + 1;
        }else{
            $final = $half + 1;
        }
        return binary_search($arr, $item, $start, $final);
    }
    return $half;
}


$start = microtime(true);
var_dump(binary_search($arr, 1589,));
$done = (round(microtime(true) - $start, 8))*1000; //0.08
echo "<p> Час: $done </p>";
