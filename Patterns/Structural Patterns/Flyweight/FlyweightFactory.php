<?php

class FlyweightFactory
{
    private $flyweights = [];

    public function __construct($initialFlyweights)
    {
        foreach ($initialFlyweights as $state) {
            $this->flyweights[$this->getKey($state)] = new Flyweight($state);
        }
    }

    private function getKey($state)
    {
        ksort($state);

        return implode("_", $state);
    }

    public function getFlyweight($sharedState): Flyweight
    {
        $key = $this->getKey($sharedState);

        if (!isset($this->flyweights[$key])) {
            echo 'FlyweightFactory: Данних не знайдено. Створюються нові.' . PHP_EOL;
            $this->flyweights[$key] = new Flyweight($sharedState);
        } else {
            echo 'FlyweightFactory: Повторно використовуються вже існуючі дані.' . PHP_EOL;
        }

        return $this->flyweights[$key];
    }

    public function listFlyweights()
    {
        $count = count($this->flyweights);
        echo PHP_EOL . 'FlyweightFactory: ' . PHP_EOL;
        foreach ($this->flyweights as $key => $flyweight) {
            echo $key . PHP_EOL;
        }
    }
}