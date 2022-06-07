<?php

class StrategyContext {
    private $strategy = NULL;

    public function __construct($strategy_ind_id) {
        switch ($strategy_ind_id) {
            case "C":
                $this->strategy = new RouteForCar();
                break;
            case "B":
                $this->strategy = new RouteForBus();
                break;
            case "P":
                $this->strategy = new PedestrianRoute();
                break;
        }
    }
    public function showSpecialRoute($route) {
        return $this->strategy->showRoute($route);
    }
}

interface StrategyInterface {
    public function showRoute($route_in);
}

class RouteForCar implements StrategyInterface {

    public function showRoute($route_in) {
        $route = $route_in->getRoute();
        return 'Route for car: ' . $route;
    }
}

class RouteForBus implements StrategyInterface {

    public function showRoute($route_in) {
        $route = $route_in->getRoute();
        return 'Route for bus: ' . $route;
    }
}

class PedestrianRoute implements StrategyInterface {

    public function showRoute($route_in) {
        $route = $route_in->getRoute();
        return 'Route for pedestrian: ' . $route;
    }
}

class RoutePlanner {
    private $route;
    function __construct($a, $b) {
        $this->route  = 'from ' . $a . ' to ' . $b;
    }
    function getRoute() {
        return $this->route;
    }
}


$route = new RoutePlanner('1st street', '34th street');

$strategyContext = new StrategyContext('C');

echo PHP_EOL;
echo $strategyContext->showSpecialRoute($route);
echo PHP_EOL;
