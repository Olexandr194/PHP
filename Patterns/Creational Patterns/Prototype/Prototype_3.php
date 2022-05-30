<?php
class Prototype {
    private $prototype;

    public function __construct(EcoAuto $auto){

        $this->prototype = $auto;
    }

    function __clone()
    {
        $this->prototype = clone $this->prototype;
    }
}

class EcoAuto {

    private $name;
    private $engine;

    public function __construct($name, $engine)
    {
        $this->name = $name;
        $this->engine = $engine;
    }

    public function getEngine() {
        return "Engine: " . $this->engine;
    }

}

class TurboAuto {

    private $name = 'BMW';
    private $engine = '2.5';

    public function getEngine() {
        return "Engine: " . $this->engine;
    }

}

function clientCode()
{
    $eco = new EcoAuto('Renault', '1.9');
    $auto = new Prototype($eco);


    $copy = clone $auto;
    print_r($copy);

}

clientCode();









/*class Auto
{
    private $name;
    protected $engine;

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getEngine()
    {
        return "Engine: " . $this->engine;
    }

    function __clone()
    {
        $this->name = clone $this->name;
        $this->engine = clone $this->engine;
    }
}

class EcoAuto extends Auto
{
    function __construct($name)
    {
        $this->name = $name;
        $this->engine = '1.9';
    }

    function __clone()
    {

    }
}

class TurboAuto extends Auto
{
    function __construct($name)
    {
        $this->name = $name;
        $this->engine = '2.5';
    }

    function __clone()
    {
    }
}


$eco = new EcoAuto('Renault');
$turbo = new TurboAuto('BMW');

$eco1 = clone $eco;
$eco1->setName('cloned Renault');
echo $eco1->getName();
echo PHP_EOL;
echo $eco1->getEngine();
echo PHP_EOL . PHP_EOL;

$turbo1 = clone $turbo;
$turbo1->setName('cloned BMW');
echo $turbo1->getName();
echo PHP_EOL;
echo $turbo1->getEngine();*/
