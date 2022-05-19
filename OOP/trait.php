<?php
trait Hello{
    public function sayHello(){
        echo 'Hello';
    }
}
trait World{
    public function sayWorld(){
        echo ' World';
    }
}

class Greeting{
    use Hello, World;
}

$obj1 = new Greeting();
$obj1->sayHello();
$obj1->sayWorld();
