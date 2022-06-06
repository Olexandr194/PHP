<?php

class CollectionOneIterator implements Iterator
{
    private $collection;
    private $position = 0;
    private $reverse = false;

    public function __construct($collection, $reverse = false)
    {
        $this->collection = $collection;
        $this->reverse = $reverse;
    }

    public function rewind()
    {
        $this->position = $this->reverse ?
            count($this->collection->getItems()) - 1 : 0;
    }

    public function current()
    {
        return $this->collection->getItems()[$this->position];
    }

    public function key()
    {
        return $this->position;
    }

    public function next()
    {
        $this->position = $this->position + ($this->reverse ? -1 : 1);
    }

    public function valid()
    {
        return isset($this->collection->getItems()[$this->position]);
    }
}

class CollectionOne implements IteratorAggregate
{
    private $items = [];

    public function getItems()
    {
        return $this->items;
    }

    public function addItem($item)
    {
        $this->items[] = $item;
    }

    public function getIterator(): Iterator
    {
        return new CollectionOneIterator($this);
    }

    public function getReverseIterator(): Iterator
    {
        return new CollectionOneIterator($this, true);
    }
}


$collection = new CollectionOne();
$collection->addItem("some text");
$collection->addItem("more text");
$collection->addItem("another one text");
$collection->addItem("different text");


foreach ($collection->getIterator() as $item) {
    echo $item . PHP_EOL;
}



