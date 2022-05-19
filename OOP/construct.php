<?php

class Person
{
    public $name = 'Alexandr';
    public $age = 30;
    public $profession = 'Blogger';

    public function __construct($name, $age, $profession)
    {
        $this->name = $name;
        $this->age = $age;
        $this->profession = $profession;
    }

    function getInfo()
    {
        return $this->name . ' ' . $this->age . ' ' . $this->profession;
    }
}

$person1 = new Person ('Bob', 25, 'Driver');

echo $person1->getInfo();


/*class Fruit
{
    public $name;
    public $color;

    function __construct($name)
    {
        $this->name = $name;
    }

    function __destruct()
    {
        echo "The fruit is {$this->name}.";
    }
}

$apple = new Fruit("");*/

