<?php

class CinemaRow
{
    protected $stack;
    protected $seatsLimit;

    public function init($stack = array(), $seatsLimit = 15) {
        $this->stack = array_reverse($stack);
        $this->seatsLimit = $seatsLimit;
    }

    public function push($item) {
        if (count($this->stack) < $this->seatsLimit) {
            array_unshift($this->stack, $item);
        } else {
            throw new RunTimeException('Стек переповнений!');
        }
    }

    public function pop() {
        if ($this->isEmpty()) {
            throw new RunTimeException('Стек порожній!');
        } else {
            return array_shift($this->stack);
        }
    }

    public function top() {
        return current($this->stack);
    }

    public function isEmpty() {
        return empty($this->stack);
    }
}

$test = new CinemaRow();
$test->init(['перший', 'другий'], 7);
$test->push('третій');
$test->push('четвертий');
$test->push('п\'ятий');
$test->push('шостий');
$test->push('сьомий');


echo $test->top();
echo PHP_EOL;
echo $test->pop();
echo PHP_EOL;
echo $test->top();





