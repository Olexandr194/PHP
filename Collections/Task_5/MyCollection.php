<?php

class MyCollection implements IteratorAggregate
{
    protected $data = [];

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function getIterator()
    {
        yield from $this->data;
    }
}