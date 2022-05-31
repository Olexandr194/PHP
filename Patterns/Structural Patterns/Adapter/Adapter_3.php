<?php

class PayPal
{
    public function sendPayment(): string
    {
        return 'Paying via PayPal: ';
    }
}

class Adaptee
{
    public function payAmount(): string
    {
        return 'Paying via PayPal NEW : ';
    }
}

class Adapter extends PayPal
{
    private $adaptee;

    public function __construct(Adaptee $adaptee)
    {
        $this->adaptee = $adaptee;
    }

    public function sendPayment(): string
    {
        return $this->adaptee->payAmount();
    }
}

function clientCode(PayPal $payPal)
{
    echo $payPal->sendPayment();
}




$adaptee = new Adaptee();

$adapter = new Adapter($adaptee);
clientCode($adapter);