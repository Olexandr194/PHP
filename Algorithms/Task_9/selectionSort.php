<?php

class SelectionSort
{
    public function selectionSort($arr)
    {
        for ($i = 0; $i < count($arr) - 1; $i++) {
            $min = $i;

            for ($j = $i + 1; $j < count($arr); $j++) {
                if ($arr[$j] < $arr[$min]) {
                    $min = $j;
                }
            }

            $temp = $arr[$i];
            $arr[$i] = $arr[$min];
            $arr[$min] = $temp;
        }
        return $arr;
    }
}

$arr = [5,598,98,59,65,6,55,6,2,5,18,69,2,6,256];

$selectionSort = new SelectionSort($arr);

$start = microtime(true);
print_r(implode(', ', $selectionSort->selectionSort($arr)));
echo PHP_EOL;
$done = (round(microtime(true) - $start, 8))*1000; //0.03
echo "Час: " . $done;


/*На очередной итерации будем находить минимум в массиве после текущего элемента и менять его с ним, если надо.
Таким образом, после i-ой итерации первые i элементов будут стоять на своих местах.
Асимптотика: O(n2) в лучшем, среднем и худшем случае. Нужно отметить,
что эту сортировку можно реализовать двумя способами – сохраняя минимум и его индекс или просто переставляя
текущий элемент с рассматриваемым, если они стоят в неправильном порядке.
Первый способ оказался немного быстрее, поэтому он и реализован.*/