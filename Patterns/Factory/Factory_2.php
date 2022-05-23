<?php


abstract class BikeFactory
{
    abstract public function factoryMethod(): Bikes;

    public function someOperation($bikeName)
    {
        $bikes = $this->factoryMethod();

        $result = $bikes->operation(). " $bikeName has been created.";

        echo $result;
    }
}

class MountainBikesFactory extends BikeFactory
{
    public function factoryMethod(): Bikes
    {
        return new MountainBike();
    }
}

class RoadBikesFactory extends BikeFactory
{
    public function factoryMethod(): Bikes
    {
        return new RoadBike();
    }
}

interface Bikes
{
    public function operation();
}

class MountainBike implements Bikes
{
    public function operation()
    {
        echo "MountainBikesFactory works successfully.";
    }
}

class RoadBike implements Bikes
{
    public function operation()
    {
        echo "RoadBikesFactory works successfully.";
    }
}

function clientCode(BikeFactory $bikeFactory, $bikeName)
{
    $bikeFactory->someOperation($bikeName);
}

clientCode(new MountainBikesFactory(), 'MountainBike');
echo PHP_EOL;
echo PHP_EOL;
clientCode(new RoadBikesFactory(), 'RoadBike');
echo PHP_EOL;