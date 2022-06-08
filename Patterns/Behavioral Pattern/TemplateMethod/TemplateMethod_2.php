<?php

abstract class Application
{
    function start()
    {
        echo 'Start using application' . PHP_EOL;
    }

    abstract function step1();
    abstract function step2();

    function mainOperation()
    {
        echo 'Some operation in progress' . PHP_EOL;
    }

    function finish()
    {
        echo 'Close application' . PHP_EOL;
    }

    function hook() {}

    function run()
    {
        $this->start();
        $this->step1();
        $this->step2();
        $this->mainOperation();
        $this->finish();
        $this->hook();
    }
}

class DarkTheme extends Application
{
    function step1()
    {
        echo 'Dark background' . PHP_EOL;
    }

    function step2()
    {
        echo 'Light icons' . PHP_EOL;
    }
}

class LightTheme extends Application
{
    function step1()
    {
        echo 'Light background' . PHP_EOL;
    }

    function step2()
    {
        echo 'Dark icons' . PHP_EOL;
    }

    function mainOperation()
    {
        echo 'Some operation in progress *by Light Theme*' . PHP_EOL;
    }
}


$application = new DarkTheme();
$application->run();
