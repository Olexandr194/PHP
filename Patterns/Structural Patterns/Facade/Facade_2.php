<?php

class Library
{
    public function runApplication() {
        echo 'START ->';
    }

    public function connectToLibrary() {
        echo 'CONNECTED ->';
    }

    public function autoLogin() {
        echo 'LOGIN';
    }

    public function saveChanges() {
        echo 'SAVED ->';
    }

    public function disconnectFromLibrary() {
        echo 'DISCONNECTED ->';
    }

    public function closeApplication() {
        echo 'EXIT';
    }

}

class Fasade
{
    protected $library;

    public function __construct(Library $library){
        $this->library = $library;
    }

    public function turnOn()
    {
        $this->library->runApplication();
        $this->library->connectToLibrary();
        $this->library->autoLogin();
    }

    public function turnOff()
    {
        $this->library->saveChanges();
        $this->library->disconnectFromLibrary();
        $this->library->closeApplication();
    }
}

$library = new Fasade(new Library());

$library->turnOn();
echo PHP_EOL;
echo PHP_EOL;
$library->turnOff();