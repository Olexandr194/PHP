<?php

class Flyweight
{
    private $sharedState;

    public function __construct($sharedState)
    {
        $this->sharedState = $sharedState;
    }

    public function operation($uniqueState)
    {
        $s = json_encode($this->sharedState);
        $u = json_encode($uniqueState);
        echo 'Постійні дані: (' . $s . '). Унікальні дані: (' . $u . ').' . PHP_EOL;
    }
}