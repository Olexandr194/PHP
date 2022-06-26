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

class BinaryTree
{
    protected $root; // корень дерева

    public function __construct()
    {
        $this->root = null;
    }

    public function isEmpty()
    {
        return $this->root === null;
    }

    public function insert($item) {
        $node = new BinaryNode($item);
        if ($this->isEmpty()) {
            // правило 1
            $this->root = $node;
        }
        else {
            // правило 1
            $this->insertNode($node, $this->root);
        }
    }

    protected function insertNode($node, &$subtree) {
        if ($subtree === null) {
            // правило 2
            $subtree = $node;
        }
        else {
            if ($node->value > $subtree->value) {
                // правило 2b
                $this->insertNode($node, $subtree->right);
            }
            else if ($node->value < $subtree->value) {
                // правило 2c
                $this->insertNode($node, $subtree->left);
            }
            else {
                // исключаем повторы, правило 2d
            }
        }
    }
}

$tree = new BinaryTree;

$tree->insert(8);


$tree->inOrderTraverse($tree->root);

