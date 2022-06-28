<?php

class Sort
{
    public static $arr = [];

    static function bubbleSort(MyCollection $collection, $type) // бульбашкове сортування. O(n*n)
    {
        foreach ($collection as $v){
            self::$arr[] = $v;
        }

        if ($type == 'AVERS') {
            for ($m = sizeof(self::$arr)-1; $m > 0; $m--){
                for ($n = 0; $n < $m; $n++) {
                    if (self::$arr[$n] > self::$arr[$n+1]) {
                        [self::$arr[$n], self::$arr[$n+1]] = [self::$arr[$n+1], self::$arr[$n]];
                    }
                }
            }
            $start = microtime(true);
            var_dump(self::$arr);
            echo PHP_EOL;
            $done = (round(microtime(true) - $start, 8))*1000;
            echo "Час: " . $done;
        }

        elseif ($type == 'REVERS') {
            for ($m = sizeof(self::$arr)-1; $m > 0; $m--){
                for ($n = 0; $n < $m; $n++) {
                    if (self::$arr[$n] < self::$arr[$n+1]) {
                        [self::$arr[$n], self::$arr[$n+1]] = [self::$arr[$n+1], self::$arr[$n]];
                    }
                }
            }
            $start = microtime(true);
            var_dump(self::$arr);
            echo PHP_EOL;
            $done = (round(microtime(true) - $start, 8))*1000;
            echo "Час: " . $done;
        }

        else echo 'Дані введені не вірно';
    }

    static function insertionSort(MyCollection $collection, $type) // сортування вставками. O(n*n)
    {
        foreach ($collection as $v){
            self::$arr[] = $v;
        }

        if ($type == 'AVERS') {
            for ($i = 1; $i < count(self::$arr); $i++) {
                $x = self::$arr[$i];
                for ($j = $i - 1; $j >= 0 && self::$arr[$j] > $x; $j--) {
                    self::$arr[$j + 1] = self::$arr[$j];
                }
                self::$arr[$j + 1] = $x;
            }
            $start = microtime(true);
            var_dump(self::$arr);
            echo PHP_EOL;
            $done = (round(microtime(true) - $start, 8))*1000;
            echo "Час: " . $done;
        }

        elseif ($type == 'REVERS') {
            for ($i = 1; $i < count(self::$arr); $i++) {
                $x = self::$arr[$i];
                for ($j = $i - 1; $j >= 0 && self::$arr[$j] < $x; $j--) {
                    self::$arr[$j + 1] = self::$arr[$j];
                }
                self::$arr[$j + 1] = $x;
            }
            $start = microtime(true);
            var_dump(self::$arr);
            echo PHP_EOL;
            $done = (round(microtime(true) - $start, 8))*1000;
            echo "Час: " . $done;
        }

        else echo 'Дані введені не вірно';
    }
}