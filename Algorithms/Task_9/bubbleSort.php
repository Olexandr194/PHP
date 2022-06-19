<?php

class BubbleSort
{
    public function BSLR (array $arr) {
        for ($m = sizeof($arr)-1; $m > 0; $m--){
            for ($n = 0; $n < $m; $n++) {
                if ($arr[$n] > $arr[$n+1]) {
                    [$arr[$n], $arr[$n+1]] = [$arr[$n+1], $arr[$n]];
                }
            }
        }
        return $arr;
    }

    public function BSRL (array $arr) {
        for ($x = 0; $x < sizeof($arr)-1; $x ++){
            for ($y = sizeof($arr)-1; $y>$x; $y--) {
                if ($arr[$y] < $arr[$y-1]) {
                    [$arr[$y], $arr[$y-1]] = [$arr[$y-1], $arr[$y]];
                }
            }
        }
        return $arr;
    }
}

$arr = [5,598,98,59,65,6,55,6,2,5,18,69,2,6,256];

$bubbleSort = new BubbleSort();

$start = microtime(true);
print_r(implode(', ', $bubbleSort->BSLR($arr)));
echo PHP_EOL;
$done = (round(microtime(true) - $start, 8))*1000; //0.04
echo "Час: " . $done;




/*Будем идти по массиву слева направо. Если текущий элемент больше следующего, меняем их местами.
Делаем так, пока массив не будет отсортирован. Заметим, что после первой итерации самый большой элемент
будет находиться в конце массива, на правильном месте.
После двух итераций на правильном месте будут стоять два наибольших элемента, и так далее.
Очевидно, не более чем после n итераций массив будет отсортирован.
Таким образом, асимптотика в худшем и среднем случае – O(n2), в лучшем случае – O(n).*/