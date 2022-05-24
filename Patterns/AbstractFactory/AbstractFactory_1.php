<?php

interface Bodywork {
    public function make(): string;
}

interface Wheels {
    public function make(): string;
}

interface Engine {
    public function make(): string;
}

class RenaultBodywork implements Bodywork{
    public function make(): string
    {
        return ' 
        __/ʼʼʼʼ\__    RENAULT
        -``-----``-   
        ';
    }
}

class RenaultWheels implements Wheels {
    public function make(): string
    {
        return ' 
        (O) (O)       RENAULT
        (O) (O)
        ';
    }
}

class RenaultEngine implements Engine {
    public function make(): string
    {
        return 'RENAULT ENGINE';
    }
}

class PeugeotBodywork implements Bodywork{
    public function make(): string
    {
        return ' 
        __/ʼʼʼʼ\__     PEUGEOT
        -``-----``-
        ';
    }
}

class PeugeotWheels implements Wheels {
    public function make(): string
    {
        return ' 
        (O) (O)        PEUGEOT
        (O) (O)
        ';
    }
}

class PeugeotEngine implements Engine {
    public function make(): string
    {
        return '
        PEUGEOT ENGINE
        ';
    }
}

interface CarFactory{
    public function createBodywork(): Bodywork;
    public function createWheels(): Wheels;
    public function createEngine(): Engine;
}

class RenaultFactory implements CarFactory{

    public function createBodywork(): Bodywork
    {
        return new RenaultBodywork();
    }

    public function createWheels(): Wheels
    {
        return new RenaultWheels();
    }

    public function createEngine(): Engine
    {
        return new RenaultEngine();
    }
}

class PeugeotFactory implements CarFactory{

    public function createBodywork(): Bodywork
    {
        return new PeugeotBodywork();
    }

    public function createWheels(): Wheels
    {
        return new PeugeotWheels();
    }

    public function createEngine(): Engine
    {
        return new PeugeotEngine();
    }
}

function clientCode(CarFactory $factory){
    echo PHP_EOL;
    echo $factory->createBodywork()->make();
    echo $factory->createWheels()->make();
    echo $factory->createEngine()->make();
    echo PHP_EOL;
}

echo 'Renault' . PHP_EOL;
clientCode(new RenaultFactory());


echo 'Peugeot' . PHP_EOL;
clientCode(new PeugeotFactory());