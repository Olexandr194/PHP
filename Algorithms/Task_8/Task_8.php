<?php
$numbers = '45 56 98 565 12 32 48';
$arr1 = explode(' ', $numbers);
$sum = 0;


for ($i = 0; $i < count($arr1); $i++) {
    $sum .= $numbers[$i];
    $arr[] = $sum;
}


print_r($arr1);