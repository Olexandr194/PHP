<!--Написать программу, которая будет запрашивать у пользователя строку - уравнение.
Проверить уравнение на правильность скобок.
Строка может иметь вид: "x * (y - 10)", ")(".
Составить блок схему для алгоритма
-->

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8"
    </head>
    <body>
    <h1>Введіть дані:</h1>
    <form action="Task_3.php" method="GET">
        <p><input type="text" name="data" value="x * (y - 10)(c+d)[""></p>
        <p><input type="submit" value="Виконати"></p>
    </form>
    </body>
</html>

<?php
if(isset($_GET['data'])){
    $someForm = $_GET['data'];
}

function check($someForm)
{
    $para = array(
        '(' => ')',
        '[' => ']'
    );
    $para = array_flip($para);
    $stack = array();
    $stack_size = 0;
    for($i=0;$i<strlen($someForm);$i++)
    {
        if (in_array($someForm[$i],array_values($para)))
            $stack[$stack_size++] = $someForm[$i];
        else if (in_array($someForm[$i],array_keys($para)))
        {
            $last = $stack_size ? $stack[$stack_size-1] : '';
            if ($last!=$para[$someForm[$i]])
                return false;
            else
                unset($stack[--$stack_size]);
        }
    }
    return count($stack)==0;
}

print check($someForm) ? 'Виконано успішно!':"Перевірте правильність розстановки знаків: '()', '[]'. ";




/*Проверка правильности расстановки скобок происходит
с помощью стека по простому алгоритму:
* Все открывающие скобки - помещаем в стек
* При встрече закрывающей скобки - проверяем, образует
  ли закрывающая скобка пару с последней в стеке.
* Если пара образуется - извлекаем последний элемент из стека,
  продолжаем работу. Если нет - скобки не парны
* В финале нужно проверить, что стек пуст. Не пустой стек -
  свидетельство о непарности скобок.*/