<?php

   function testString($string, $part1, $part2)
    {
        $test = $part1 . $part2;
        $seq1 = str_split($string);
        $seq2 = str_split($part1);
        $seq3 = str_split($part2);
        $seq4 = str_split($test);
        $seq5 = str_split($string);

        $x = strlen($string);
        $x1 = strlen($string);
        $y = strlen($part1);
        $z = strlen($part2);

        foreach ($seq4 as $v) {
            if (in_array($v, $seq5)) {
                $k = array_search($v, $seq5);
                unset($v);
                unset($seq5[$k]);
            } else {
                $s = $v;
            }
        }
        if (!isset($s)) {
            while ($x > 0 && $y > 0) {
                if ($seq1[$x - 1] == $seq2[$y - 1]) {
                    $x--;
                    $y--;
                } else {
                    $x--;
                }
            }
            while ($x1 > 0 && $z > 0) {
                if ($seq1[$x1 - 1] == $seq3[$z - 1]) {
                    $x1--;
                    $z--;
                } else {
                    $x1--;
                }
            }
            if ($y == 0 && $z == 0) {
                echo "Result: Може";
            } else {
                echo "Result: Невірна послідовність літер";
            }
        }else {
            echo "Result: Не може";
        }
    }
$string = 'codecool';
$part1 = 'oeoo';
$part2 = 'dlw';

$start = microtime(true);
testString($string, $part1, $part2);
$done = (round(microtime(true) - $start, 8))*1000;

echo PHP_EOL;
echo "<p> Час: $done </p>";