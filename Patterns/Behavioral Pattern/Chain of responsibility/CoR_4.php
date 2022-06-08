<?php

interface Handler
{
    public function setNext(Handler $handler): Handler;

    public function handle($request);
}

abstract class AbstractChain implements Handler
{
    private $nextHandler;

    public function setNext(Handler $handler): Handler
    {
        $this->nextHandler = $handler;
        return $handler;
    }

    public function handle($request)
    {
        if ($this->nextHandler) {
            return $this->nextHandler->handle($request);
        }
        return null;
    }
}

class Chain1 extends AbstractChain
{
    public function handle($request)
    {
        if ($request === "task for chain 1") {
            return "Done by Chain1 - " . $request . ".\n";
        } else {
            return parent::handle($request);
        }
    }
}

class Chain2 extends AbstractChain
{
    public function handle($request)
    {
        if ($request === "task for chain 2") {
            return "Done by Chain2 - " . $request . ".\n";
        } else {
            return parent::handle($request);
        }
    }
}

class Chain3 extends AbstractChain
{
    public function handle($request)
    {
        if ($request === "task for chain 3") {
            return "Done by Chain3 - " . $request . ".\n";
        } else {
            return parent::handle($request);
        }
    }
}

function clientCode(Handler $handler)
{
    foreach (["task for chain 1", "task for chain 2", "different task"] as $task) {

        $result = $handler->handle($task);
        if ($result) {
            echo "  " . $result;
        } else {
            echo "  " . $task . " - was left untouched.\n";
        }
    }
}

$c1 = new Chain1();
$c2 = new Chain2();
$c3 = new Chain3();

$c1->setNext($c2)->setNext($c3);


clientCode($c2);


