<?php

interface Builder
{
    public function paint();
    public function fork();
}

class ConcreteBuilder1 implements Builder
{
    private $product;

    public function __construct()
    {
        $this->product = new Product();
    }

    public function paint()
    {
        $this->product->add('Regular paining');
    }

    public function fork()
    {
        $this->product->add('Steel fork added');
    }

    public function getResult()
    {
        return $this->product;
    }
}


class ConcreteBuilder2 implements Builder
{
    private $product;

    public function __construct()
    {
        $this->product = new Product();
    }

    public function paint()
    {
        $this->product->add('Custom painting');
    }
    public function fork()
    {
        $this->product->add('Chrome fork');
    }

    public function getResult()
    {
        return $this->product;
    }
}

class Product
{
    private $list;

    public function add($elem)
    {
        $this->list[] = $elem;
    }

    public function getProduct()
    {
        foreach ($this->list as $el) {
            echo $el . PHP_EOL;
        }
    }
}

class Director
{
    public function setConstruct($builder)
    {
        $builder->paint();
        $builder->fork();
    }
}

$director = new Director();

$builder1 = new ConcreteBuilder1();
$builder2 = new ConcreteBuilder2();

$director->setConstruct($builder2);

$product1 = $builder2->getResult();
$product1->getProduct();

