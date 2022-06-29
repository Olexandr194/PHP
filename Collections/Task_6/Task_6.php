<?php
/*Задача 6: Создать класс, который будет хранить в себе данные пользователя, а именно:
персональный номер, имя, фамилия, возраст. Создать коллекцию таких пользователей и добавить туда 10 элементов.
Отсортировать коллекцию по персональному номеру по возрастани. Вывести коллекцию до и после сортировки.
*/

require_once ('Users.php');
require_once ('UsersCollection.php');
require_once ('UsersSort.php');

$collection = new UsersCollection();

$collection->getUser(new Users('1', 'John', 'Johnson', '18'));
$collection->getUser(new Users('8', 'David', 'Davidson', '19'));
$collection->getUser(new Users('5', 'Andy', 'Andyson', '20'));
$collection->getUser(new Users('2', 'Dock', 'Dockson', '21'));
$collection->getUser(new Users('4', 'Din', 'Dinson', '22'));
$collection->getUser(new Users('6', 'Mack', 'Mackson', '23'));
$collection->getUser(new Users('9', 'Oly', 'Olyson', '24'));
$collection->getUser(new Users('10', 'Alex', 'Alexson', '25'));
$collection->getUser(new Users('7', 'Michel', 'Michelson', '26'));
$collection->getUser(new Users('3', 'SomeName', 'SomeNameson', '27'));


$sort = new UsersSort();
$sort->sort($collection);