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
<form action="Linery.php" method="GET">
    <p>Введіть число більше 10000: <input type="number" name="array" value="12000"></p>
    <p><input type="submit" value="Виконати"></p>
</form>
</body>
</html>

<?php
if (isset($_GET['array'])) {
    $array_length = $_GET['array'];
}
for ($i = 1; $i <= $array_length; $i++) {
    $arr[] = mt_rand(1, 1000);
}

/*var_dump($arr);*/

$max_in_arr = max($arr);
$min_in_arr = min($arr);

function maxInArr($arr, $max_in_arr)
{
    foreach ($arr as $k=>$v) {
        if ($v === $max_in_arr) {
            return $k;
        }
    }
    return false;
}

function minInArr($arr, $min_in_arr)
{
    foreach ($arr as $k=>$v) {
        if ($v === $min_in_arr) {
            return $k;
        }
    }
    return false;
}

echo "<p>Індекс з максимальними значеннями: </p>";
$start = microtime(true);
var_dump(maxInArr($arr, $max_in_arr));
$done = (round(microtime(true) - $start, 8))*1000; //0.03
echo "<p> Час: $done </p>";

echo PHP_EOL;
echo "<p>Індекс з мінімальним значеннями: </p>";
var_dump(minInArr($arr, $min_in_arr));

