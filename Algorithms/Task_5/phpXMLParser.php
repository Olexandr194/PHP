<!--Создать простой парсер из XML в массив данных, сделать метод для вывода всех значений по определенному тегу.-->

<?php

class XmlParser1
{
    private $tag;
    private $xml;

    public function getData($xml, $tag)
    {
        if ($tag == 'FullName') {
            foreach ($xml as $v) {
                echo '<pre>' . $v->id . ' - ' . $v->first_name . ' ' . $v->last_name . '<br>';
            }
        } elseif ($tag == 'Email') {
            foreach ($xml as $v) {
                echo '<pre>' . $v->first_name . ' ' . $v->last_name . ' - ' . $v->email . '<br>';
            }
        } elseif ($tag == 'Address') {
            foreach ($xml as $v) {
                echo '<pre>' . $v->first_name . ' ' . $v->last_name . ' - ' . $v->ip_address . '<br>';
            }
        }
    }

}

$xml = simplexml_load_file("data.xml") or die("Не вдалось завантажити XML-файл :(");

$parser = new XmlParser1();
$parser->getData($xml, 'Email');

