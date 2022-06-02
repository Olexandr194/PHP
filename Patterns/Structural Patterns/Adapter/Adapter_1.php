<?php

class Privat
{
    public function pay(): string
    {
        return "Paying via PayPal: ";
    }
}

class Adaptee
{
    public function specificPay2(): string
    {
        return "Paying via PayPal NEWWW";
    }
}

class Adapter extends Privat
{
    private $adaptee;

    public function __construct(Adaptee $adaptee)
    {
        $this->adaptee = $adaptee;
    }

    public function pay(): string
    {
        return $this->adaptee->specificPay2();
    }
}

function clientCode(Adaptee $adaptee)
{
    echo $adaptee->specificPay2();
}


$adaptee = new Adaptee();
clientCode($adaptee);
echo "\n\n";

/*$adaptee = new Adaptee();

echo "Adaptee: " . $adaptee->specificPay();
echo "\n\n";


$adapter = new Adapter($adaptee);
clientCode($adapter);*/