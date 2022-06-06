<?php

interface Collection
{
    public function CreateIterator();
}

class CollectionOne implements Collection

{
    public function CreateIterator()
    {
        $list = [
            "some text",
            "more text",
            "another one text",
            "different text",
        ];
        return new CollectionOneIterator($list);
    }
}

interface TestIterator
{
    public function First();
    public function Next();
    public function IsDone();
    public function CurrentItem();
}

class CollectionOneIterator implements TestIterator
{
    private $list;
    private $index;
    public function __construct($list)
    {
        $this->list = $list;
        $this->index = 0;
    }
    public function First()
    {
        $this->index = 0;
    }

    public function Next()
    {
        $this->index++;
    }

    public function IsDone()
    {
        return $this->index >= count($this->list);
    }

    public function CurrentItem()
    {
        return $this->list[$this->index];
    }
}
$collection = new CollectionOne();
$iterator = $collection->CreateIterator();

while (!$iterator->IsDone()) {
    echo $iterator->CurrentItem(), PHP_EOL;
    $iterator->Next();
}
