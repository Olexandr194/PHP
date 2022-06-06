<?php

interface Observer {
    public function addCurrency(Currency $currency);
}

class priceSimulator implements Observer {
    private $currencies;

    public function __construct() {
        $this->currencies = array();
    }

    public function addCurrency(Currency $currency) {
        array_push($this->currencies, $currency);
    }

    public function updatePrice() {
        foreach ($this->currencies as $currency) {
            $currency->update();
        }
    }
}

interface Currency {
    public function update();
    public function getPrice();
}

class Pound implements Currency {
    private $price;

    public function __construct($price) {
        $this->price = $price;
        echo 'Pound Original Price: ' . $price;
    }

    public function update() {
        $this->price = $this->getPrice();
        echo 'Pound Updated Price :' . $this->price . PHP_EOL;
    }

    public function getPrice() {
        return f_rand(0.65, 0.71);
    }

}

class Yen implements Currency {
    private $price;

    public function __construct($price) {
        $this->price = $price;
        echo 'Yen Original Price : ' . $price;
    }

    public function update() {
        $this->price = $this->getPrice();
        echo 'Yen Updated Price : ' . $this->price;
    }

    public function getPrice() {
        return f_rand(120.52, 122.50);
    }

}

function f_rand($min=0,$max=1,$mul=1000000){
    if ($min>$max) return false;
    return mt_rand($min*$mul,$max*$mul)/$mul;
}

$priceSimulator = new priceSimulator();

$currency1 = new Pound(0.60);
echo PHP_EOL;
$currency2 = new Yen(122);

$priceSimulator->addCurrency($currency1);
echo PHP_EOL;

$priceSimulator->addCurrency($currency2);

echo PHP_EOL;
$priceSimulator->updatePrice();
echo PHP_EOL;
echo PHP_EOL;
$priceSimulator->updatePrice();
echo PHP_EOL;