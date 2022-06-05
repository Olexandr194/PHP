<?php

class TextEditor {
    private $text;

    function __construct($text_in) {
        $this->setText($text_in);
    }
    function getText() {
        return $this->text;
    }
    function setText($text_in) {
        $this->text = $text_in;
    }

    function setUpper() {
        $this->setText(strtoupper($this->getText()));
    }
    function setLower() {
        $this->setText(strtolower($this->getText()));
    }
    function viceVersa() {
        $this->setText(strrev($this->getText()) . strrev($this->getText()));
    }
    function versaVice() {
        $this->setText($this->getText());
    }
    function setStarsOn() {
        $this->setText(Str_replace(' ','*',$this->getText()));
    }
    function setStarsOff() {
        $this->setText(Str_replace('*',' ',$this->getText()));
    }
}

abstract class EditorCommand {
    protected $editorCommander;
    function __construct($editorCommander_in) {
        $this->editorCommander = $editorCommander_in;
    }
    abstract function execute();
}

class EditorSetToUpper extends EditorCommand {
    function execute() {
        $this->editorCommander->setUpper();
    }
}

class EditorSetToLower extends EditorCommand {
    function execute() {
        $this->editorCommander->setLower();
    }
}

class EditorViceVersa extends EditorCommand {
    function execute() {
        $this->editorCommander->viceVersa();
    }
}

class EditorVersaVice extends EditorCommand {
    function execute() {
        $this->editorCommander->versaVice();
    }
}

class EditorStarsOn extends EditorCommand {
    function execute() {
        $this->editorCommander->setStarsOn();
    }
}

class EditorStarsOff extends EditorCommand {
    function execute() {
        $this->editorCommander->setStarsOff();
    }
}

function callCommand(EditorCommand $editorCommander_in) {
    $editorCommander_in->execute();
}

function clientCode(){
    $text = new TextEditor('Some Short Text');

    echo 'BEFORE: ';
    echo $text->getText();
    echo PHP_EOL;
    echo PHP_EOL;

    $editedText = new EditorSetToLower($text);
    callCommand($editedText);

    echo 'AFTER: ';
    echo $text->getText();
    echo PHP_EOL;
}

clientCode();