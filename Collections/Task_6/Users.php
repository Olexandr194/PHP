<?php

class Users {

    public $id;
    public $name;
    public $surname;
    public $age;

    public function __construct($id_in, $name_in, $surname_in, $age_in) {
        $this->id = $id_in;
        $this->name = $name_in;
        $this->surname = $surname_in;
        $this->age = $age_in;
    }
}