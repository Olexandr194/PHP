<?php
class BinaryNode
{
    public $value;    // значение узла
    public $left;     // левый потомок типа BinaryNode
    public $right;     // правый потомок типа BinaryNode

    public function __construct($item) {
        $this->value = $item;
        // новые потомки - вершина
        $this->left = null;
        $this->right = null;
    }
}

