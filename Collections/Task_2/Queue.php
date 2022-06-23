<?php

class TaskQueue
{
    protected $queue;
    protected $limit;

    public function init($queue = array(), $limit = 15) {
        $this->queue = array_reverse($queue);
        $this->limit = $limit;
    }

    public function enqueue($item) {
        if (count($this->queue) < $this->limit) {
            array_unshift($this->queue, $item);
        } else {
            throw new RunTimeException('Черга переповнена!');
        }
    }

    public function dequeue() {
        if ($this->isEmpty()) {
            throw new RunTimeException('Черга порожня!');
        } else {
            return array_pop($this->queue);
        }
    }

    public function isEmpty() {
        return empty($this->queue);
    }
}

$test = new TaskQueue();
$test->init(['завдання номер 1', 'завдання номер 2'], 7);
$test->enqueue('завдання номер 3');
$test->enqueue('завдання номер 4');
$test->enqueue('завдання номер 5');
$test->enqueue('завдання номер 6');
$test->enqueue('завдання номер 7');


echo $test->dequeue();
echo PHP_EOL;
echo $test->dequeue();

