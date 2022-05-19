<?php

class Person
{
    public static $name;

    public static function sum($a, $b)
    {
        echo $a + $b;
    }

    public static function setName($name)
    {
        echo self::$name = $name;
    }
}

Person::setName('Alexandr');

Person::sum(25, 20);

$admin = new Person();
$admin::sum(25, 25);


/*class Model
{
    public static $table = 'table';

    public static function getTable()
    {
        return self::$table;
    }
}

class User extends Model
{
    public static $table = 'users';
}

echo User::getTable();*/