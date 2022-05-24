<?php

interface Button {
    public function paint(): string;
}

interface CheckBox {
    public function paint(): string;
}

class MacButton implements Button {
    public function paint(): string
    {
        return '
        ~~~~~~~~~~~~~~~~~
        ~~~ MacButton ~~~
        ~~~~~~~~~~~~~~~~~
        ';
    }
}

class MacCheckBox implements CheckBox {
    public function paint(): string
    {
        return '
        ~~~~~~~~~~~~~~~~~
        ~~~~~~~~~~~~~~~~~
        ~~ MacCheckBox ~~
        ~~~~~~~~~~~~~~~~~
        ~~~~~~~~~~~~~~~~~
        ';
    }
}

class WinButton implements Button {
    public function paint(): string
    {
        return '
        ~~~~~~~~~~~~~~~~~
        ~~~ WinButton ~~~
        ~~~~~~~~~~~~~~~~~
        ';
    }
}

class WinCheckBox implements CheckBox {
    public function paint(): string
    {
        return '
        ~~~~~~~~~~~~~~~~~
        ~~~~~~~~~~~~~~~~~
        ~~ WinCheckBox ~~
        ~~~~~~~~~~~~~~~~~
        ~~~~~~~~~~~~~~~~~
        ';
    }
}

interface GUIFactory{
    public function createButton(): Button;
    public function createCheckBox(): CheckBox;
}

class WinFactory implements GUIFactory{

    public function createButton(): Button
    {
        return new WinButton();
    }

    public function createCheckBox(): CheckBox
    {
        return new WinCheckBox();
    }
}

class MacFactory implements GUIFactory{

    public function createButton(): Button
    {
        return new MacButton();
    }

    public function createCheckBox(): CheckBox
    {
        return new MacCheckBox();
    }
}


function clientCode(GUIFactory $factory){
    echo PHP_EOL;
    echo $factory->createButton()->paint();
    echo $factory->createCheckBox()->paint();
    echo PHP_EOL;
}

echo 'Detected Windows env.' . PHP_EOL;
$winFactory = new WinFactory();
clientCode($winFactory);


/*echo 'Detected Mac env.' . PHP_EOL;
$macFactory = new MacFactory();
clientCode($macFactory);*/