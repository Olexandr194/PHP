<?php

class Node
{
    public $left;
    public $right;
    public $value;

    public function __construct($value, $left, $right)
    {
        $this->left = $left;
        $this->right = $right;
        $this->value = $value;
    }

}

class BinaryTree
{
    public $root;

    public function insert($data)
    {
        $node = $this->createNode($data);

        if (is_null($this->root)) {
            $this->root = $node;
        }
        else {
            $this->insertNode($this->root, $node);
        }
    }

    public function insertNode(Node $node, Node $newNode)
    {
        if ($newNode->value < $node->value) {
            if ($node->left == null) {
                $node->left = $newNode;
            } else {
                $this->insertNode($node->left, $newNode);
            }
        }
        if ($newNode->value > $node->value) {
            if ($node->right == null) {
                $node->right = $newNode;
            } else {
                $this->insertNode($node->right, $newNode);
            }
        }
    }

    public function inOrderTraverse($node)
    {
        if ($node != null) {
            $this->inOrderTraverse($node->left);
            var_dump($node->value);
            $this->inOrderTraverse($node->right);
        }
    }

    public function preOrderTraverse($node)
    {
        if ($node != null) {
            var_dump($node->value);
            $this->preOrderTraverse($node->left);
            $this->preOrderTraverse($node->right);
        }
    }

    public function postOrderTraverse($node)
    {
        if ($node != null) {
            $this->postOrderTraverse($node->left);
            $this->postOrderTraverse($node->right);
            var_dump($node->value);
        }
    }

    public function createNode($data, $left = null, $right = null)
    {
        return new Node($data, $left, $right);
    }

    public function findMin($node)
    {
        while ($node && $node->left != null) {
            $node = $node->left;
        }

        return $node->value;
    }

    public function findMax($node)
    {
        while ($node && $node->right != null) {
            $node = $node->right;
        }

        return $node->value;
    }

    public function find($node, $value)
    {
        if ($node == null) {
            return 'Не знайдено.';
        }
        if ($value > $node->value) {
            return $this->find($node->right, $value);
        } elseif ($value < $node->value) {
            return $this->find($node->left, $value);
        } else {
            return 'Знайдено.';
        }
    }

    public function removeNode($node, $value)
    {
        if ($node == null) {
            return null;
        }

        if ($value > $node->value) {
            $node->right = $this->removeNode($node->right, $value);
            return $node;
        } elseif ($value < $node->value) {
            $node->left = $this->removeNode($node->left, $value);
            return $node;
        } else {
            //In the first case, the node to be deleted is a leaf node. There is no left subtree or right subtree. You can delete it directly
            if ($node->left == null && $node->right == null) {
                return null;
            }
            //In the second case, there is a left node or a right node
            if ($node->left == null) {
                $node = $node->left;
                return $node;
            } elseif ($node->right == null) {
                $node = $node->right;
                return $node;
            } else {
                //In the third case, if both the left and right nodes have children, the minimum value of the right node should be found,
                //Replace it with the value of the current node to be deleted, and then delete the original node

                $minValue = $this->findMin($node->right);
                $node->value = $minValue;
                $node->right = $this->removeNode($node->right, $minValue);
                return $node;
            }


        }
    }

}


/**
 *
 *                   8
 *                 /    \
 *              3        10
 *            /   \        \
 *         1       6       14
 *               /  \     /  \
 *              4    7   13   20
 *
 *
 */

$tree = new BinaryTree;
$tree->insert(8);
$tree->insert(7);
$tree->insert(25);
$tree->insert(56);
$tree->insert(9);
$tree->insert(1);
$tree->insert(32);

var_dump ($tree->root);

//Middle order traversal test
//$tree->inOrderTraverse($tree->root);
//Preorder traversal test
//$tree->preOrderTraverse($tree->root);
//Postorder traversal test
//$tree->postOrderTraverse($tree->root);

//Find minimum test
//$min = $tree->findMin($tree->root);
//dd($min);
//Find maximum test
//$max = $tree->findMax($tree->root);
//dd($max);

//Find node
//$nodeExists = $tree->find($tree->root, 9);
//dd($nodeExists);

//Delete node test
//dump($tree->root);
/*$result = $tree->removeNode($tree->root, 32);
$tree->inOrderTraverse($tree->root);*/

//dump($tree->root);

/*
$result = $nodeExists = $tree->find($tree->root, 8);;

echo $result;*/