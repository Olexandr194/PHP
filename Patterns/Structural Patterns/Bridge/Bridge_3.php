<?php

interface CarFactory {
    public function __construct(Color $color);
    public function getCar();
}

class Renault implements CarFactory {
    protected $color;

    public function __construct(Color $color)
    {
        $this->color = $color;
    }

    public function getCar()
    {
        return $this->color->getColor() . ' Renault';
    }
}

class BMW implements CarFactory {
    protected $color;

    public function __construct(Color $color)
    {
        $this->color = $color;
    }

    public function getCar()
    {
        return $this->color->getColor() . ' BMW';
    }
}



interface Color {
    public function getColor();
}

class BlackColor implements Color
{
    public function getColor()
    {
        return 'Dark black';
    }
}

class LightColor implements Color {
    public function getColor()
    {
        return 'Off white';
    }
}

class AquaColor implements Color {
    public function getColor()
    {
        return 'Light blue';
    }
}

$aqua = new AquaColor();
$black = new BlackColor();


$renault = new Renault($aqua);
$bmw = new BMW($black);
echo $renault->getCar();
echo PHP_EOL;
echo $bmw->getCar();
