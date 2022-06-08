<?php

class Camera
{
    private $state;

    public function __construct(State $state)
    {
        $this->transitionTo($state);
    }

    public function transitionTo(State $state)
    {
        $this->state = $state;
        $this->state->setContext($this);
    }

    public function request1()
    {
        $this->state->action1();
    }

    public function request2()
    {
        $this->state->action2();
    }
}

abstract class State
{
    protected $context;

    public function setContext(Camera $context)
    {
        $this->context = $context;
    }

    abstract public function action1();

    abstract public function action2();
}

class CameraOnOff extends State
{
    public function action1()
    {
        echo 'Камеру увімкнено. Можна почати запис';
        $this->context->transitionTo(new RecordStartStop());
    }

    public function action2()
    {
        echo 'Камеру вимкнено.';
    }

}

class RecordStartStop extends State
{
    public function action1()
    {
        echo 'Триває запис відео...';
    }

    public function action2()
    {
        echo 'Запис відео зупинено.';
        $this->context->transitionTo(new CameraOnOff());
    }
}


$context = new Camera(new CameraOnOff());
$context->request1();
echo PHP_EOL;
$context->request1();
echo PHP_EOL;
$context->request2();
echo PHP_EOL;
$context->request2();