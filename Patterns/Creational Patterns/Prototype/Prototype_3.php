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



$p1 = new Prototype();
/*$p1->b = 38;*/

$p2 = clone $p1;
echo $p2->b;



