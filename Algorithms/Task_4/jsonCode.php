<?php
$res = file_get_contents('data.json');

$data = json_decode($res, true);
var_dump($data);


$jsonData = json_encode($data);
file_put_contents('t.json', $jsonData);







/*$fileName = 'data.json';

function jsonCode($fileName)
{
    if (is_array($fileName)) {
        $jsonData = json_encode($fileName);
        file_put_contents('t.json', $jsonData);
    } elseif (preg_match('/.json/', $fileName)) {
        $res = file_get_contents('data.json');
        $data = json_decode($res, true);
        var_dump($data);
    } else {
        echo 'NAN';
    }
}

jsonCode($fileName);*/


