<?php

/*Может ли заданная строка s быть составлена из двух других строк, part1 и part2.
Ограничение состоит в том, что символы в частях part1 и part2 должны быть в том же порядке, что и в s.
Например:
«codecool» — это слияние «cdw» и «oeoo»:
 	s: c o d e c o o l = codecool
часть 1: c d c l = cdw
part2: o e o o = o e o o*/

function testString($string, $part1, $part2)
{
    $seq1 = str_split($string);
    $seq2 = str_split($part1);
    $seq3 = str_split($part2);

    $x = strlen($string);
    $x1 = strlen($string);

    $y = strlen($part1);
    $z = strlen($part2);

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
        echo "Result: YES";
    } else {
        echo "Result: NO";
    }
}

$string = 'codecool';
$part1 = 'oeoo';
$part2 = 'cdw';


testString($string, $part1, $part2);