<?php

interface SomeDrink
{
    public function getCost();
    public function getDescription();
}

class Coffee implements SomeDrink
{
    public function getCost()
    {
        return '20';
    }

    public function getDescription()
    {
        return 'Coffee';
    }
}



class Decorator implements SomeDrink
{
    protected $someDrink;

    public function __construct(SomeDrink $someDrink)
    {
        $this->someDrink = $someDrink;
    }

    public function getCost()
    {
        return $this->someDrink->getCost();
    }

    public function getDescription()
    {
        return $this->someDrink->getDescription();
    }
}

class MilkCoffee extends Coffee
{
    protected $someDrink;

    public function __construct(SomeDrink $someDrink)
    {
        $this->someDrink = $someDrink;
    }

    public function getCost()
    {
        return $this->someDrink->getCost() +5;
    }

    public function getDescription()
    {
        return $this->someDrink->getDescription() . ' + milk';
    }
}

class IrishCoffee extends Coffee
{
    protected $someDrink;

    public function __construct(SomeDrink $someDrink)
    {
        $this->someDrink = $someDrink;
    }

    public function getCost()
    {
        return $this->someDrink->getCost() +15;
    }

    public function getDescription()
    {
        return $this->someDrink->getDescription() . ' + whiskey';
    }
}

function clientCode(SomeDrink $someDrink)
{
    echo "DRINK: " . $someDrink->getDescription() . ' ' . $someDrink->getCost() . PHP_EOL;
}

$simple = new Coffee();

clientCode($simple);



$decorator1 = new MilkCoffee($simple);
$decorator2 = new IrishCoffee($decorator1);

clientCode($decorator2);