<?php
abstract class Person {

    public $name;
    public $age;

    public function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    abstract public function hello();
}

class Developer extends Person {

    public function hello() {
        echo 'Привіт! Я developer. Моє ім\'я '.$this->name.'. Мені '.$this->age.' років.'.PHP_EOL;
    }
}
class Driver extends Person {

    public function hello() {
        echo 'Привіт! Я driver. Моє ім\'я '.$this->name.'. Мені '.$this->age.' років.'.PHP_EOL;
    }
}
class Blogger extends Person {

    public function hello() {
        echo 'Привіт! Я blogger. Моє ім\'я '.$this->name.'. Мені '.$this->age.' років.'.PHP_EOL;
    }
}

$greetings[] = new Developer('Bob', 30);
$greetings[] = new Driver('John', 40);
$greetings[] = new Blogger('Alex', 50);


 /*for ($i=0; $i<count($greeting); $i++) {
     $greeting[$i]->hello();
     }*/

 foreach ($greetings as $greeting) {
     $greeting->hello();
 }



