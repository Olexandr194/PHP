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

    public function __construct() {
        $this->root = null;
    }

    public function isEmpty() {
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
                echo 'Значення уже існує';
            }
        }
    }


    public function retrieve($node) {
        if ($this->isEmpty()) {
            return false;
        }
        $current = $this->root;
        if ($node->item === $this->root->item) {
            return true;
        } else {
            return $this->retrieveNode($node, $current);
        }
    }
    /**
     * Method to recursively add nodes to a binary tree
     */
    private function retrieveNode($node, $current) {
        $exists = false;
        while($exists === false) {
            if ($node->item < $current->item) {
                if ($current->left === null) {
                    break;
                }
                elseif($node->item == $current->left->item) {
                    $exists = $current->left;
                    break;
                }
                else {
                    $current = $current->left;
                    return $this->retrieveNode($node, $current);
                }
            }
            elseif ($node->data > $current->item) {
                if ($current->right === null) {
                    break;
                }
                elseif($node->data == $current->right->item) {
                    $exists = $current->right;
                    break;
                } else {
                    $current = $current->right;
                    return $this->retrieveNode($node, $current);
                }
            }
        }
        return $exists;
    }


    public function removeElement($elem)
    {
        if ($this->isEmpty()) {
            return false;
        }
        $node = $this->retrieve($elem);
        if (!$node) {
            return false;
        }
        if ($elem->data === $this->root->data) {
// find the largest value in the left sub tree
            $current = $this->root->left;
            while ($current->right != null) {
                $current = $current->right;
                continue;
            }
// set this node to be the root
            $current->left = $this->root->left;
            $current->right = $this->root->right;
//Find the parent for the node and set it as the parent for any //children the node may have had
            $parent = $this->findParent($current, $this->root);
            $parent->right = $current->left;
//finally set that node as the new root for the binary tree
            $this->root = $current;
            return true;
        }
    }

    private function findParent($child, $current) {
        $parent = false;
        while ($parent === false) {
            if ($child->data < $current->data) {
                if ($child->data === $current->left->data) {
                    $parent = $current;
                    break;
                } else {
                    return $this->findParent($child, $current->left);
                    break;
                }
            }
            elseif ($child->data > $current->data) {
                if ($child->data === $current->right->data) {
                    $parent = $current;
                    break;
                } else {
                    return $this->findParent($child, $current->right);
                    break;
                }
            } else {
                break;
            }
        }
        return $parent;
    }


    public function traverse() {
        // отображение дерева в возрастающем порядке от корня
        $this->root->dump();
    }
}

$tree = new BinaryTree;

$tree->insert(8);


$tree->retrieve(8);
