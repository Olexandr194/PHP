<?php

class Tree
{
    public $data = array();
    public $tree = array();

    public function __construct()
    {
        $this->data = $this->getCategoryArray();
    }

    private function getCategoryArray()
    {
        $arr = [
            0 => [
                [
                    'id_tree_test' => 2,
                    'id_parent' => 0,
                    'title' => "Два"
                ]
            ],
            1 => [
                [
                    'id_tree_test' => 4,
                    'id_parent' => 1,
                    'title' => "Чотири"
                ]

            ],
            2 => [
                [
                    'id_tree_test' => 1,
                    'id_parent' => 2,
                    'title' => "Один"
                ],
                [
                    'id_tree_test' => 5,
                    'id_parent' => 2,
                    'title' => "П'ять"
                ]
            ],
            /*3 => [
                [
                    'id_tree_test' => 8,
                    'id_parent' => 3,
                    'title' => "Вісім"
                ]
            ],*/
            4 => [
                [
                    'id_tree_test' => 3,
                    'id_parent' => 4,
                    'title' => "Три"
                ]/*,
                [
                    'id_tree_test' => 6,
                    'id_parent' => 4,
                    'title' => "Шість"
                ],
                [
                    'id_tree_test' => 7,
                    'id_parent' => 4,
                    'title' => "Сім"
                ]*/
            ],
            /*7 => [
                [
                    'id_tree_test' => 9,
                    'id_parent' => 7,
                    'title' => "Дев'ять"
                ]
            ],*/
        ];

        return $arr;
    }

    public function buildTree($parent_id, $level)
    {
        if (isset($this->data[$parent_id])) {
            foreach ($this->data[$parent_id] as $value) {
                echo "<div style=\"margin-left:" . ($level * 25) . "px;\">" . $value["id_tree_test"] . " : " . $value["title"] . "</div>";
                $level++;
                $this->buildTree($value["id_tree_test"], $level);
                $level--;
            }
        }
    }

}

$tree = new Tree();
$tree->buildTree(0, 0);













/*Алгоритм (паттерн, если так хотите) будет примерно следующим:
0. Создаём объект дерева и выбираем все элементы в таблице.
1. Вызываем метод построения. Он инициализирует сборку массива родительских категорий.
Именно этот момент является ноу-хау данного алгоритма. Он позволяет нам организовать изящную рекурсию.
2. Итеративно обходим массив, начиная с нулевого элемента. Выводим информацию о текущем элементе.
3. Увеличиваем уровень погружения. Рекурсивно вызываем метод для дочернего элемента.
Если он есть в массиве родительских категорий, то идем к шагу 2, иначе — выходим в шаг-инициализатор.
4. Уменьшаем уровень погружения. Выходим из итерации.*/
