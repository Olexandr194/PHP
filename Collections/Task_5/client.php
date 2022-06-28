<?php
require_once ('MyCollection.php');
require_once ('Sort.php');

$arr = [5,598,98,59,65,6,55,6,2,5,18,69,2,6,256];
$collection = new MyCollection($arr);



/*Sort::bubbleSort($collection, 'REVERS');*/


Sort::insertionSort($collection, 'AVERS');






