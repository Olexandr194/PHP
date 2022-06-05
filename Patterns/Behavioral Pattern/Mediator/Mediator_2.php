<?php

abstract class Mediator
{
    abstract public function send($message, Colleague $colleague);
}


abstract class Colleague
{
    protected $mediator;

    public function __construct(Mediator $mediator)
    {
        $this->mediator = $mediator;
    }
}


class ConcreteMediator extends Mediator
{
    private $colleague1;
    private $colleague2;

    public function setColleague1($c1)
    {
        $this->colleague1 = $c1;
    }

    public function setColleague2($c2)
    {
        $this->colleague2 = $c2;
    }

    public function send($message, Colleague $colleague)
    {
        if ($colleague == $this->colleague1) {
            $this->colleague2->notify($message);
        } else {
            $this->colleague1->notify($message);
        }
    }
}


class ConcreteColleague1 extends Colleague
{
    public function send($message)
    {
        $this->mediator->send($message, $this);
    }

    public function notify($message)
    {
        Echo "concretecollague1 gets a message: {$message}";
    }
}


class ConcreteColleague2 extends Colleague
{
    public function send($message)
    {
        $this->mediator->send($message, $this);
    }

    public function notify($message)
    {
        Echo "concretecollague2 get message: {$message}";
    }
}

##Client code
$m = new ConcreteMediator();

$c1 = new ConcreteColleague1($m);
$c2 = new ConcreteColleague2($m);

$m->setColleague1($c1);
$m->setColleague2($c2);

$c1->send ("are you off duty?");
echo PHP_EOL;
echo PHP_EOL;
$c2->send ("not yet, working overtime tonight");


