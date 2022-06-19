<?php

class MergeSort
{
    function mergeSort($arr)
    {
        if (count($arr) == 1) return $arr;
        $mid = count($arr) / 2;
        $left = array_slice($arr, 0, $mid);
        $right = array_slice($arr, $mid);
        $left = $this->mergeSort($left);
        $right = $this->mergeSort($right);
        return $this->merge($left, $right);
    }

    function merge($left, $right)
    {
        $res = array();
        while (count($left) > 0 && count($right) > 0) {
            if ($left[0] > $right[0]) {
                $res[] = $right[0];
                $right = array_slice($right, 1);
            } else {
                $res[] = $left[0];
                $left = array_slice($left, 1);
            }
        }
        while (count($left) > 0) {
            $res[] = $left[0];
            $left = array_slice($left, 1);
        }
        while (count($right) > 0) {
            $res[] = $right[0];
            $right = array_slice($right, 1);
        }
        return $res;
    }
}

$arr = [5,598,98,59,65,6,55,6,2,5,18,69,2,6,256];

$mergeSort = new MergeSort($arr);

$start = microtime(true);
print_r(implode(', ', $mergeSort->mergeSort($arr)));
echo PHP_EOL;
$done = (round(microtime(true) - $start, 8))*1000; //0.08
echo "Час: " . $done;




/*
Merge sort is a divide and conquer algorithm. It is based on the idea of dividing the unsorted array
into several sub-array until each sub-array consists of a single element and merging those sub-array in such a way
that results into a sorted array. The process step of merge sort can be summarized as follows:

Divide: Divide the unsorted array into several sub-array until each sub-array contains only single element.
Merge: Merge the sub-arrays in such way that results into sorted array and merge until achieves the original array.
Merging technique: the first element of the two sub-arrays is considered and compared.
For ascending order sorting, the element with smaller value is taken from the sub-array and becomes a new element of
the sorted array. This process is repeated until both sub-array are emptied and the merged array becomes sorted array*/