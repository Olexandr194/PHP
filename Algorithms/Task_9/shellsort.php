<?php

class ShellSort
{
    public function shellSort($arr)
    {
        $k = 0;
        $gap[0] = (int)(count($arr) / 2);

        while ($gap[$k] > 1) {
            $k++;
            $gap[$k] = (int)($gap[$k - 1] / 2);
        }
        for ($i = 0; $i <= $k; $i++) {
            $step = $gap[$i];

            for ($j = $step; $j < count($arr); $j++) {
                $temp = $arr[$j];
                $p = $j - $step;
                while ($p >= 0 && $temp < $arr[$p]) {
                    $arr[$p + $step] = $arr[$p];
                    $p = $p - $step;
                }
                $arr[$p + $step] = $temp;
            }
        }
        return $arr;
    }
}

$arr = [5,598,98,59,65,6,55,6,2,5,18,69,2,6,256];

$shellSort = new ShellSort($arr);

$start = microtime(true);
print_r(implode(', ', $shellSort->shellSort($arr)));
echo PHP_EOL;
$done = (round(microtime(true) - $start, 8))*1000; //0.035
echo "Час: " . $done;



/*Идея метода заключается в сравнение разделенных на группы элементов последовательности,
находящихся друг от друга на некотором расстоянии. Изначально это расстояние равно d или N/2,
где N — общее число элементов. На первом шаге каждая группа включает в себя два элемента расположенных друг от друга
на расстоянии N/2; они сравниваются между собой, и, в случае необходимости, меняются местами.
На последующих шагах также происходят проверка и обмен, но расстояние d сокращается на d/2, и количество групп,
соответственно, уменьшается. Постепенно расстояние между элементами уменьшается, и на d=1 проход по массиву
происходит в последний раз.

Эффективность сортировки Шелла в определённых случаях обеспечивается тем, что элементы «быстрее» встают на свои места
(в простых методах сортировки, например, пузырьковой, каждая перестановка двух элементов
уменьшает количество инверсий в списке максимум на 1, а при сортировке Шелла это число может быть больше).

Невзирая на то, что сортировка Шелла во многих случаях медленнее, чем быстрая сортировка, она имеет ряд преимуществ:

- отсутствие потребности в памяти под стек;
- отсутствие деградации при неудачных наборах данных — быстрая сортировка легко деградирует до O(n²),
что хуже, чем худшее гарантированное время для сортировки Шелла.

Последовательность Шелла – первый элемент равен длине массива, каждый следующий вдвое меньше предыдущего.
Асимптотика в худшем случае – O(n2).*/
