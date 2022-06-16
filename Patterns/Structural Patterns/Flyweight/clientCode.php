<?php

include ("Flyweight.php");
include ("FlyweightFactory.php");

$factory = new FlyweightFactory([
    ["Chevrolet", "pink"],
    ["Mercedes Benz", "black"],
    ["Mercedes Benz", "red"],
    ["BMW", "red"],
    ["BMW", "white"],
]);

function addCarToDatabase(FlyweightFactory $ff, $plates, $brand, $color) {
    echo PHP_EOL . 'Здійснюється внесення автомобіля до бази даних.' . PHP_EOL;
    $flyweight = $ff->getFlyweight([$brand, $color]);
    $flyweight->operation([$plates]);
}


$factory->listFlyweights();

addCarToDatabase($factory, "25689", "BMW", "red",);

addCarToDatabase($factory, "48596", "BMW", "black",);

$factory->listFlyweights();
