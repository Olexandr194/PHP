<?php
/*Напишите функцию, которая принимает неотрицательное целое число (секунды)
 в качестве входных данных и возвращает время в удобочитаемом формате (ЧЧ:ММ:СС)
 	ЧЧ = часы, дополненные до 2 цифр, диапазон: 00–99
 	ММ = минуты, дополненные до 2 цифр, диапазон: 00–59
 	SS = секунды, дополненные двумя цифрами, диапазон: 00–59
Максимальное время никогда не превышает 359999 (99:59:59) Примеры:
"00:01:00" => 60*/


function fromTimeToTime($someNumber)
{
    $special_date = mktime(0, 0, 0);

    if($someNumber < 0 || $someNumber > 359999) {
        echo 'Введіть число від 0 до 359999!';
        exit();
    }

    $o = round($someNumber / 3600);

    if ($o < 10) {
        $o = '0'.$o;
    } elseif ($o > 99) {
        $o = 99;
    }
    echo date($o . ':i:s', $special_date + $someNumber);
}

fromTimeToTime(359999);

