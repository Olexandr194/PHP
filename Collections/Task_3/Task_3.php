<?php

/*Задача 3: Узнайте что такое дерево и как оно работает. Реализуйте дерево в классах с минимум такими методами:
create – создать пустую таблицу.
insert – добавить элемент в таблицу.
delete – удалить элемент из таблицы.
retrieve – найти элемент в таблице.
Правило вставки:
Если дерево пустое — вставим [новый_узел] как корень дерева (очевидно же!)
пока (дерево не пустое):
2a. Если ([текущий узел] пуст) — вставить сюда и остановиться;
2b. Если ([новый_узел] > [текущий узел]) — пробуем вставить [новый_узел] справа и повторим шаг 2
2c. Если ([новый_узел] < [текущий узел]) — пробуем вставить [новый_узел] слева и повторим шаг 2
2d. Иначе значение уже в дереве
Реализуйте обход и отобразите дерево. Составить блок схему*/

require_once ('BinaryNode.php');
require_once ('BinaryTree.php');


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
