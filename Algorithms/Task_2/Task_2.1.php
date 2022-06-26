<?php
$categories = [
    ['id' => 1, 'name' => 'Велосипеди', 'parent_id' => 0],
    ['id' => 2, 'name' => 'МТБ', 'parent_id' => 1],
    ['id' => 3, 'name' => 'Шосейні', 'parent_id' => 1],
    ['id' => 4, 'name' => 'Kona', 'parent_id' => 2],
    ['id' => 5, 'name' => 'Santa Cruz', 'parent_id' => 2],
    ['id' => 6, 'name' => 'Pinarello', 'parent_id' => 3],
    ['id' => 7, 'name' => 'Bianchi', 'parent_id' => 3],
    ['id' => 8, 'name' => 'Kona Mahuna', 'parent_id' => 4],
    ['id' => 9, 'name' => 'Kona Hanzo', 'parent_id' => 4],
    ['id' => 10, 'name' => 'Pinarello Classic', 'parent_id' => 6],
];

function search (&$currCategory, $categories) {
    $id = $currCategory['id'];
    $childs = [];

    foreach ($categories as $category) {
        if ($category['parent_id'] == $id) {
            search($category, $categories);
            $childs[] = $category;
        }
    }
    $currCategory['childs'] = $childs;
}

$treeCategory = [$categories[0]];
search($treeCategory[0], $categories);

print_r($treeCategory);