<?php

class UsersSort
{
    protected $arr = [];
    protected $id;

    public function sort(UsersCollection $collection)
    {
        echo 'Колекція до сортування: ' . PHP_EOL;
        foreach ($collection as $v) {
            echo json_encode($v) . PHP_EOL;
            $this->arr[] = $v;
        }
        for ($x = 0; $x < sizeof($this->arr) - 1; $x++) {
            for ($y = sizeof($this->arr) - 1; $y > $x; $y--) {
                if ($this->arr[$y]['id'] < $this->arr[$y - 1]['id']) {
                    [$this->arr[$y], $this->arr[$y - 1]] = [$this->arr[$y - 1], $this->arr[$y]];
                }
            }
        }
        echo PHP_EOL;
        echo PHP_EOL;
        echo 'Колекція після сортування: ' . PHP_EOL;
        foreach ($this->arr as $k => $str) {
            echo json_encode($str) . PHP_EOL;
        }


    }


}

