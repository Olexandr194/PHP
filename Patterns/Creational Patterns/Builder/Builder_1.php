<?php

interface Builder
{
    public function carWash(): void;

    public function varnish(): void;

    public function vacuuming(): void;

}

class ConcreteBuilder1 implements Builder
{
    private $product;

    public function __construct()
    {
        $this->reset();
    }

    public function reset(): void
    {
        $this->product = new Product1();
    }

    public function carWash(): void
    {
        $this->product->parts[] = "Car is washed";
    }

    public function varnish(): void
    {
        $this->product->parts[] = "Car is varnished";
    }

    public function vacuuming(): void
    {
        $this->product->parts[] = "Vacuuming completed";
    }


    public function getProduct(): Product1
    {
        $result = $this->product;
        $this->reset();

        return $result;
    }
}

class ConcreteBuilder2 implements Builder
{
    private $product;

    public function __construct()
    {
        $this->reset();
    }

    public function reset(): void
    {
        $this->product = new Product1();
    }

    public function carWash(): void
    {
        $this->product->parts[] = "Prise = 10$";
    }

    public function varnish(): void
    {
        $this->product->parts[] = "Prise = 10$";
    }

    public function vacuuming(): void
    {
        $this->product->parts[] = "Prise = 5$";
    }


    public function getProduct(): Product1
    {
        $result = $this->product;
        $this->reset();

        return $result;
    }
}


class Product1
{
    public $parts = [];

    public function listParts(): void
    {
        echo "Product parts: " . implode(', ', $this->parts) . "\n\n";
    }
}


class Director
{

    private $builder;

    public function setBuilder(Builder $builder): void
    {
        $this->builder = $builder;
    }

    public function buildMinimalProduct(): void
    {
        $this->builder->carWash();
    }

    public function buildFullProduct(): void
    {
        $this->builder->carWash();
        $this->builder->varnish();
        $this->builder->vacuuming();
    }
}

function clientCode(Director $director)
{
    $builder = new ConcreteBuilder1();
    $director->setBuilder($builder);

    /*echo "Standard basic services:\n";
    $director->buildMinimalProduct();
    $builder->getProduct()->listParts();

    echo "Standard full featured services:\n";
    $director->buildFullProduct();
    $builder->getProduct()->listParts();*/

    echo "Custom services:\n";
    $builder->carWash();
    $builder->vacuuming();
    $builder->getProduct()->listParts();
}

$director = new Director();
clientCode($director);