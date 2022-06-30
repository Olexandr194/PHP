<?php

class MyCollection {
    private $collection = array();

    public function getArr() {
        echo 'Перелік номерів: <pre>';
        foreach ($this->collection as $v) {
            echo '<pre>' . $v;
        }
    }

    public function add($number) {
        if(isset($number)) {
            if ($number == 'СПИСОК') {
                $this->getArr();
            }
            elseif ($number == 'СТОП') {
                header("Location: stop.html");
            }
            else $this->collection[] = $number;
        }
    }
}