<?php

class radioControl {
    public function turnOn() {
        // Turning On Radio
        echo "Turning On Radio";
    }
    public function turnOff() {
        // Turning Off Radio
        echo "Turning Off Radio";
    }
}

// Command
interface radioCommand {
    public function execute();
}

class turnOnRadio implements radioCommand {
    private $radioControl;
    public function __construct(radioControl $radioControl) {
        $this->radioControl = $radioControl;
    }
    public function execute() {
        $this->radioControl->turnOn ();
    }
}

class turnOffRadio implements radioCommand {
    private $radioControl;
    public function __construct(radioControl $radioControl) {
        $this->radioControl = $radioControl;
    }
    public function execute() {
        $this->radioControl->turnOff ();
    }
}


// Client
$in = 'turnOffRadio';

// Invoker
if (class_exists ( $in )) {
    $command = new $in ( new radioControl () );
} else {
    throw new Exception ( '..Command Not Found..' );
}

$command->execute ();