
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
    <form action="Array_search.php" method="GET">
        <p>Введіть число більше 10000: <input type="number" name="array" value="12000"></p>
        <p><input type="submit" value="Виконати"></p>
    </form>
    </body>
</html>

<?php
if(isset($_GET['array'])){
    $array_length = $_GET['array'];
}
for ($i = 1; $i <= $array_length; $i++) {
    $arr[$i] = mt_rand(1, 1000);
}


/*echo "<p>Індекс з максимальним значеннями: </p>";
$start = microtime(true);
var_dump(array_search(max($arr),$arr));
$done = (round(microtime(true) - $start, 8))*1000; //0.07
echo "<p> Час: $done </p>";


echo "<p>Індекс з мінімальним значеннями: </p>";
var_dump(array_search(min($arr),$arr));*/


echo "<p>Індекси з максимальними значеннями: </p>";
$start = microtime(true);
var_dump(array_keys($arr,max($arr)));

echo "<p>Індекси з мінімальним значеннями: </p>";
var_dump(array_keys($arr,min($arr)));

$done = round(microtime(true) - $start, 6);
echo "<p> Час: $done </p>";
