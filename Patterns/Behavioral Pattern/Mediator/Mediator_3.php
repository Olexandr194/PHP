<?php

interface Mediator
{
    public function notify($sender, $event);
}

class Editor implements Mediator
{
    private $component1;
    private $component2;

    public function __construct(Buttons $buttons, Actions $actions)
    {
        $this->component1 = $buttons;
        $this->component1->setMediator($this);
        $this->component2 = $actions;
        $this->component2->setMediator($this);
    }

    public function notify($sender, $event)
    {
        if ($event == "Save") {

            $this->component2->doC();
        }

        if ($event == "Save and exit") {

            $this->component2->doC();
            $this->component2->doD();
        }
    }
}

class BaseComponent
{
    protected $mediator;

    public function __construct(Mediator $mediator = null)
    {
        $this->mediator = $mediator;
    }

    public function setMediator(Mediator $mediator)
    {
        $this->mediator = $mediator;
    }
}

class Buttons extends BaseComponent
{
    public function doA()
    {
        $this->mediator->notify($this, "Save");
    }

    public function doB()
    {
        $this->mediator->notify($this, "Save and exit");
    }
}

class Actions extends BaseComponent
{
    public function doC()
    {
        echo 'file has been saved' . PHP_EOL;
        $this->mediator->notify($this, "Saving");
    }

    public function doD()
    {
        echo 'saving... and log out!' . PHP_EOL;
        $this->mediator->notify($this, "Log out");
    }
}

$c1 = new Buttons();
$c2 = new Actions();
$mediator = new Editor($c1, $c2);

$c1->doB();

