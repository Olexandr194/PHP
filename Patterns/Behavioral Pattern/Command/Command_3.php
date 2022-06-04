<?php

class BookCommandee {
    private $author;
    private $title;
    function __construct($title_in, $author_in) {
        $this->setAuthor($author_in);
        $this->setTitle($title_in);
    }
    function getAuthor() {
        return $this->author;
    }
    function setAuthor($author_in) {
        $this->author = $author_in;
    }
    function getTitle() {
        return $this->title;
    }
    function setTitle($title_in) {
        $this->title = $title_in;
    }
    function setStarsOn() {
        $this->setAuthor(Str_replace(' ','*',$this->getAuthor()));
        $this->setTitle(Str_replace(' ','*',$this->getTitle()));
    }
    function setStarsOff() {
        $this->setAuthor(Str_replace('*',' ',$this->getAuthor()));
        $this->setTitle(Str_replace('*',' ',$this->getTitle()));
    }
    function getAuthorAndTitle() {
        return $this->getTitle().' by '.$this->getAuthor();
    }
}

abstract class BookCommand {
    protected $bookCommandee;
    function __construct($bookCommandee_in) {
        $this->bookCommandee = $bookCommandee_in;
    }
    abstract function execute();
}

class BookStarsOnCommand extends BookCommand {
    function execute() {
        $this->bookCommandee->setStarsOn();
    }
}

class BookStarsOffCommand extends BookCommand {
    function execute() {
        $this->bookCommandee->setStarsOff();
    }
}


$book = new BookCommandee('Design Patterns', 'Gamma, Helm, Johnson, and Vlissides');

echo $book->getAuthorAndTitle();
echo PHP_EOL;

$starsOn = new BookStarsOnCommand($book);
callCommand($starsOn);

echo $book->getAuthorAndTitle();
echo PHP_EOL;

$starsOff = new BookStarsOffCommand($book);
callCommand($starsOff);
echo $book->getAuthorAndTitle();
writeln('');

writeln('END TESTING COMMAND PATTERN');


function callCommand(BookCommand $bookCommand_in) {
    $bookCommand_in->execute();
}

function writeln($line_in) {
    echo $line_in."<br/>";
}