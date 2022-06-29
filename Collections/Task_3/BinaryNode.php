<?php

class BinaryNode
{
    public $value;
    public $left;
    public $right;

    public function __construct($item) {
        $this->value = $item;

        $this->left = null;
        $this->right = null;
    }
}