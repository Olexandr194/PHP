<?php
interface Machine {
    public function calcTask();
}
class Circle implements Machine {
    private $radius;
    public function __construct($radius){
        $this -> radius = $radius;
    }
    public function calcTask(){
        return $this -> radius * $this -> radius * pi();
    }
}
class Rectangle implements Machine {
    private $width;
    private $height;
    public function __construct($width, $height){
        $this -> width = $width;
        $this -> height = $height;
    }
    public function calcTask(){
        return $this -> width * $this -> height;
    }
}
$a = new Circle(3);
$b = new Rectangle(3,4);
echo $a->calcTask();
echo PHP_EOL;
echo $b->calcTask();