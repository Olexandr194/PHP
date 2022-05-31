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







