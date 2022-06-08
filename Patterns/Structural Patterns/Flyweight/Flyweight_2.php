<?php

class Flyweight
{
    private $sharedState;

    public function __construct($sharedState)
    {
        $this->sharedState = $sharedState;
    }

    public function operation($uniqueState)
    {
        $s = json_encode($this->sharedState);
        $u = json_encode($uniqueState);
        echo 'Shared: (' . $s . '). Unique: (' . $u . ').' . PHP_EOL;
    }
}

class FlyweightFactory
{
    private $flyweights = [];

    public function __construct($initialFlyweights)
    {
        foreach ($initialFlyweights as $state) {
            $this->flyweights[$this->getKey($state)] = new Flyweight($state);
        }
    }

    private function getKey($state)
    {
        ksort($state);

        return implode("_", $state);
    }

    public function getFlyweight($sharedState): Flyweight
    {
        $key = $this->getKey($sharedState);

        if (!isset($this->flyweights[$key])) {
            echo 'FlyweightFactory: Can\'t find a flyweight, creating new one.' . PHP_EOL;
            $this->flyweights[$key] = new Flyweight($sharedState);
        } else {
            echo 'FlyweightFactory: Reusing existing flyweight.' . PHP_EOL;
        }

        return $this->flyweights[$key];
    }

    public function listFlyweights()
    {
        $count = count($this->flyweights);
        echo PHP_EOL . 'FlyweightFactory: ' . PHP_EOL;
        foreach ($this->flyweights as $key => $flyweight) {
            echo $key . PHP_EOL;
        }
    }
}

function addCarToDatabase(FlyweightFactory $ff, $plates, $brand, $color) {
    echo PHP_EOL . 'Adding a car to database.' . PHP_EOL;
    $flyweight = $ff->getFlyweight([$brand, $color]);
    $flyweight->operation([$plates]);
}

$factory = new FlyweightFactory([
    ["Chevrolet", "pink"],
    ["Mercedes Benz", "black"],
    ["Mercedes Benz", "red"],
    ["BMW", "red"],
    ["BMW", "white"],
]);
$factory->listFlyweights();

addCarToDatabase($factory, "25689", "BMW", "red",);

addCarToDatabase($factory, "48596", "BMW", "black",);

$factory->listFlyweights();