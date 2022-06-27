<!--Задача 4: Предположим, что Вы разрабатываете программу для учета автомобилей на парковке.
По требованию заказчика нужно будет сохранять гос номера автомобиля в виде списка.
Удалять из списка автомобили не нужно, только добавлять их в конец списка.
При этом допускается, что гос номера могут повторяться.

Напишите программу, которая во время работы будет ожидать ввода в консоли нового гос номера автомобиля
и после ввода добавлять его в список. При вводе слова "СПИСОК" будет выводить весь список гос номеров автомобилей
и дальше ожидать команды. При вводе слова “СТОП” будет заканчивать работу. Используйте для решения задачи коллекции.
-->

<!doctype html>
<html>
<head>
    <meta charset="UTF-8"
</head>
<body>
<h1>Введіть номер автомобіля:</h1>
<form action="Task_4.php" method="GET">
    <p><input type="text" name="array" value=""></p>
    <p><input type="submit" value="Додати"></p>
</form>
</body>
</html>

<?php

class MyCollection {
    private $collection = array();

    public function getArr() {
        echo 'Перелік номерів: <pre>';
        foreach ($this->collection as $v) {
            echo '<pre>' . $v;
        }
    }

    public function add($number) {
        if(isset($number)) {
            if ($number == 'СПИСОК') {
                $this->getArr();
            }
            elseif ($number == 'СТОП') {
               header("Location: stop.html");
            }
            else $this->collection[] = $number;
        }
    }
}

function program()
{
    if (isset($_GET['array'])) {
        $opo = $_GET['array'];
    }

    $test = new MyCollection();
    $test->add('as4566ed');
    $test->add('fd8448tg');
    $test->add('ju8724nm');


    $test->add($opo);
}

program();