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

class BinaryTree
{
    public $root;

    public function __construct()
    {
        $this->root = null;
    }

    public function isEmpty()
    {
        return $this->root === null;
    }

    public function insert($item)
    {
        $node = new BinaryNode($item);
        if ($this->isEmpty()) {
            $this->root = $node;
        } else {
            $this->insertNode($node, $this->root);
        }
    }

    protected function insertNode($node, &$subtree)
    {
        if ($subtree === null) {
            $subtree = $node;
        } else {
            if ($node->value > $subtree->value) {
                $this->insertNode($node, $subtree->right);
            } else if ($node->value < $subtree->value) {
                $this->insertNode($node, $subtree->left);
            } else {
                echo 'Значення: "' . $subtree->value . '" уже існує';
                exit();
            }
        }
    }

    public function retrieve($node, $value)
    {
        if ($node == null) {
            echo 'Не знайдено.';
            exit();
        }
        if ($value > $node->value) {
            return $this->retrieve($node->right, $value);
        } elseif ($value < $node->value) {
            return $this->retrieve($node->left, $value);
        } else {
            echo 'Знайдено.';
        }
    }

    public function delete($node, $value)
    {
        if ($node == null) {
            return null;
        }

        if ($value > $node->value) {
            $node->right = $this->delete($node->right, $value);
            return $node;
        } elseif ($value < $node->value) {
            $node->left = $this->delete($node->left, $value);
            return $node;
        } else {
            if ($node->left == null && $node->right == null) {
                return null;
            }
            if ($node->left == null) {
                $node = $node->right;
            } elseif ($node->right == null) {
                $node = $node->left;
            } else {
                $minValue = $this->findMin($node->right);
                $node->value = $minValue;
                $node->right = $this->delete($node->right, $minValue);
            }
            return $node;
        }
    }

    public function findMin($node)
    {
        while ($node && $node->left != null) {
            $node = $node->left;
        }
        return $node->value;
    }

    public function traverse($node)
    {
        if ($node != null) {
            $this->traverse($node->left);
            var_dump($node->value);
            $this->traverse($node->right);
        }
    }

}

$tree = new BinaryTree;

$tree->insert(16);
$tree->insert(8);
$tree->insert(7);
$tree->insert(9);
$tree->insert(15);
$tree->insert(10);
$tree->insert(1);
$tree->insert(2);

$tree->delete($tree->root, 8);

$tree->insert(25);
$tree->insert(4);
$tree->insert(3);
$tree->insert(872);

$tree->traverse($tree->root);