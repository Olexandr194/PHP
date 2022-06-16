<!--Создать класс API с двумя методами
1-принимает массив параметров и возвращает строку json
2-принимает json и возвращает массив-->


<?php

class ApiTest
{
    private $fileName;
    private $data;

    public function JsonToArr($fileName)
    {
        $res = file_get_contents($fileName);
        $data = json_decode($res, true);
        var_dump($data);
    }

    public function ArrToJson($data)
    {
        $jsonData = json_encode($data);
        file_put_contents('t1.json', $jsonData);
    }
}
$fileName = 'data.json';

$apiTest = new ApiTest();
$apiTest->JsonToArr($fileName);




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


