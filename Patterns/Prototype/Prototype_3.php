<?php

class Prototype
{
    public $a = 45;
    public $b = 36;

    public function __clone()
    {
        echo "Cloned" . PHP_EOL;
    }
}

class ClassB extends Prototype {
    public $prototype;
    public function __construct (Prototype $prototype){
        $this->prototype = $prototype;
    }
}

$p1 = new Prototype();


$p2 = clone $p1;
echo $p2->b;

