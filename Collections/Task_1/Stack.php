<?php

class TaskList
{
    protected $stack;
    protected $limit;

    public function init($stack = array(), $limit = 15) {
        $this->stack = array_reverse($stack);
        $this->limit = $limit;
    }

    public function push($item) {
        if (count($this->stack) < $this->limit) {
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

$test = new TaskList();
$test->init(['завдання з пріоритетом 1', 'завдання з пріоритетом 2'], 7);
$test->push('завдання з пріоритетом 3');
$test->push('завдання з пріоритетом 4');
$test->push('завдання з пріоритетом 5');
$test->push('завдання з пріоритетом 6');
$test->push('завдання з пріоритетом 7');


echo $test->top();
echo PHP_EOL;
echo $test->pop();
echo PHP_EOL;
echo $test->top();





