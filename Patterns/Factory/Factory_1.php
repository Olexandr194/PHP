<?php

abstract class Logistic
{
    abstract public function getTransport(): Transport;

    public function deliverCargo($cargoName)
    {
        $transport = $this->getTransport();

        $transport->load();
        $transport->deliver($cargoName);
        $transport->unload();
    }
}

class AirLogistic extends Logistic
{
    public function getTransport(): Transport
    {
        return new Plane();
    }
}

class RoadLogistic extends Logistic
{
    public function getTransport(): Transport
    {
        return new Truck();
    }
}

class MaritimeLogistic extends Logistic
{
    public function getTransport(): Transport
    {
        return new Ship();
    }
}

interface Transport
{
    public function load();
    public function deliver($cargo);
    public function unload();
}

class Plane implements Transport
{
    public function load()
    {
        echo "The plain is loading... \n";
    }

    public function deliver($cargo)
    {
        echo "The plain delivering $cargo \n";
    }

    public function unload()
    {
        echo "The plain unloaded \n";
    }
}

class Truck implements Transport
{
    public function load()
    {
        echo "The truck is loading... \n";
    }

    public function deliver($cargo)
    {
        echo "The truck delivering $cargo \n";
    }

    public function unload()
    {
        echo "The truck unloaded \n";
    }
}

class Ship implements Transport
{
    public function load()
    {
        echo "The ship is loading... \n";
    }

    public function deliver($cargo)
    {
        echo "The ship delivering $cargo \n";
    }

    public function unload()
    {
        echo "The ship unloaded \n";
    }
}

function clientCode(Logistic $logistic, $cargo)
{
    $logistic->deliverCargo($cargo);
}

clientCode(new AirLogistic(), 'Some cargo');
echo PHP_EOL;
clientCode(new RoadLogistic(), 'Another cargo');
echo PHP_EOL;
clientCode(new MaritimeLogistic(), 'New one cargo');


