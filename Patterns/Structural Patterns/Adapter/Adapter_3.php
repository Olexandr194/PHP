<?php

class Privat
{
    public function pay()
    {
        echo 'Privat pay';
    }
}

class Mono
{
    public function monoPay(){
        echo 'Mono pay';

    }
}

class MonoAdapter extends Privat
{
    protected $mono;

    public function __construct(Mono $mono)
    {
        $this->mono = $mono;
    }

    public function pay()
    {
        $this->mono->monoPay();
    }
}


function clientCode(Privat $privat)
{
    echo $privat->pay();
}

$privat = new Privat();
clientCode($privat);

echo PHP_EOL;

$mono = new Mono();
$monoAdapter = new MonoAdapter($mono);
clientCode($monoAdapter);


