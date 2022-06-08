<?php

interface Products
{
    public function accept(Visitor $visitor);
}

class CheapStuff implements Products
{
    public function accept(Visitor $visitor)
    {
        $visitor->visitCheapStuff($this);
    }

    public function listOfCheapStuff()
    {
        return 'Cheap product 1, Cheap product 2';
    }
}

class ExpensiveStuff implements Products
{
    public function accept(Visitor $visitor)
    {
        $visitor->visitExpensiveStuff($this);
    }

    public function listOfExpensiveStuff()
    {
        return 'Expensive product 1, Expensive product 2';
    }
}

interface Visitor
{
    public function visitCheapStuff(CheapStuff $element);

    public function visitExpensiveStuff(ExpensiveStuff $element);
}

class Discount implements Visitor
{
    public function visitCheapStuff(CheapStuff $element)
    {
        echo $element->listOfCheapStuff() . ' - 15% OFF!.' . PHP_EOL;
    }

    public function visitExpensiveStuff(ExpensiveStuff $element)
    {
        echo $element->listOfExpensiveStuff() . ' - 10% OFF' . PHP_EOL;
    }
}

class AddingToDatabase implements Visitor
{
    public function visitCheapStuff(CheapStuff $element)
    {
        echo $element->listOfCheapStuff() . ' - added to database.' . PHP_EOL;
    }

    public function visitExpensiveStuff(ExpensiveStuff $element)
    {
        echo $element->listOfExpensiveStuff() . ' - added to database.' . PHP_EOL;
    }
}

function clientCode(array $components, Visitor $visitor)
{
    foreach ($components as $component) {
        $component->accept($visitor);
    }
}

$components = [
    new CheapStuff(),
    new ExpensiveStuff(),
];

echo PHP_EOL;
$visitor1 = new Discount();
clientCode($components, $visitor1);
echo PHP_EOL;


$visitor2 = new AddingToDatabase();
clientCode($components, $visitor2);