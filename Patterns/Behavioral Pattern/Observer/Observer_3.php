<?php

abstract class Observer
{
    abstract function update(Subject $subject_in);
}

abstract class Subject
{
    abstract function attach(Observer $observer_in);

    abstract function detach(Observer $observer_in);

    abstract function notify();
}


class Client extends Observer
{
    public function __construct()
    {
    }

    public function update(Subject $subject)
    {
        echo ' Some new stuff: ' . $subject->getFavorites();
    }
}

class Shop extends Subject
{
    private $favoriteProducts = NULL;
    private $observers = array();

    function __construct()
    {
    }

    function attach(Observer $observer_in)
    {
        $this->observers[] = $observer_in;
    }

    function detach(Observer $observer_in)
    {
        foreach ($this->observers as $key => $oval) {
            if ($oval == $observer_in) {
                unset($this->observers[$key]);
            }
        }
    }

    function notify()
    {
        foreach ($this->observers as $obs) {
            $obs->update($this);
        }
    }

    function updateFavorites($newFavorites)
    {
        $this->favorites = $newFavorites;
        $this->notify();
    }

    function getFavorites()
    {
        return $this->favorites;
    }
}


$shop = new Shop();
$client = new Client();
$shop->attach($client);
echo PHP_EOL;
$shop->updateFavorites('apple, coffee');
echo PHP_EOL;
$shop->updateFavorites('plum, pineapple, pear');
echo PHP_EOL;
/*$shop->detach($client);*/
echo PHP_EOL;
$shop->updateFavorites('banana, tea, cookie, ');
echo PHP_EOL;

