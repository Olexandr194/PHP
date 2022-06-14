<?php

$xml = simplexml_load_file("data.xml") or die("Не вдалось завантажити XML-файл :(");

function getIdAndFullName($xml)
{
    foreach ($xml as $v) {
         echo '<pre>' . $v->id . ' - ' . $v->first_name. ' ' . $v->last_name . '<br>';
    }
}

function getEmail($xml)
{
    foreach ($xml as $v) {
        echo '<pre>' . $v->first_name. ' ' . $v->last_name . ' - ' . $v->email . '<br>';
    }
}

function getIpAddress($xml)
{
    foreach ($xml as $v) {
        echo '<pre>' . $v->first_name. ' ' . $v->last_name . ' - ' . $v->ip_address . '<br>';
    }
}

/*print_r($xml);*/
getIpAddress($xml);
