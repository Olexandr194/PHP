<?php

class BubbleSort
{
    public function BSLR (array $arr) {
        for ($m = sizeof($arr)-1; $m > 0; $m--){
            for ($n = 0; $n < $m; $n++) {
                if ($arr[$n] > $arr[$n+1]) {
                    [$arr[$n], $arr[$n+1]] = [$arr[$n+1], $arr[$n]];
                }
            }
        }
        return $arr;
    }

    public function BSRL (array $arr) {
        for ($x = 0; $x < sizeof($arr)-1; $x ++){
            for ($y = sizeof($arr)-1; $y>$x; $y--) {
                if ($arr[$y] < $arr[$y-1]) {
                    [$arr[$y], $arr[$y-1]] = [$arr[$y-1], $arr[$y]];
                }
            }
        }
        return $arr;
    }
}

$arr = [5,598,98,59,65,6,55,6,2,5,18,69,2,6,256];

$bubbleSort = new BubbleSort();
print_r($bubbleSort->BSRL($arr));
