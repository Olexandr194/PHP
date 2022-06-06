<?php

class NoteBook
{
    private $content = '';

    public function type($words)
    {
        $this->content = $this->content . ' ' . $words;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function save(): SnapShot
    {
        return new SnapShot($this->content);
    }

    public function restore(SnapShot $memento)
    {
        $this->content = $memento->getContent();
    }
}

interface Memento
{
    public function getContent();
}

class SnapShot implements Memento
{
    protected $content;

    public function __construct($content)
    {
        $this->content = $content;
    }

    public function getContent()
    {
        return $this->content;
    }

}



$editor = new NoteBook();
$editor->type('Some text.');
$editor->type('Text before saving.');
$memento = $editor->save();

$editor->type('And text after making a snapshot.');
echo $editor->getContent() . PHP_EOL;


$editor->restore($memento);
echo $editor->getContent() . PHP_EOL;
