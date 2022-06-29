<?php

class SomeCollection implements IteratorAggregate
{
    protected $data = [];

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function getIterator()
    {
        yield from $this->data;
    }
}

class Sorter
{
    public static $arr = [];

    static function someSort(SomeCollection $collection, $type) //
    {
        foreach ($collection as $v){
            self::$arr[] = $v;
        }

        if ($type == 'AVERS') {
            return self::quickSort(self::$arr, 'AVERS');
            }
    }

    static function quickSort($arr2, $type) //
    {
        if ($type == 'AVERS') {
            if (count($arr2) > 1) {
                $base = array_shift($arr2);
                $start = [];
                $end = [];
                foreach ($arr2 as $v) {
                    if ($v >= $base) {
                        $start[] = $v;
                    } elseif ($v < $base) {
                        $end[] = $v;
                    }
                }
                return array_merge(self::quickSort($start, 'AVERS'), array(key($arr2) => $base), self::quickSort($end, 'AVERS'));
            }
            $start = microtime(true);
            var_dump($arr2);
            echo PHP_EOL;
            $done = (round(microtime(true) - $start, 8)) * 1000;
            echo "Час: " . $done;
        }
    }
}

$arr = [68, 5,598,98,59,65,6,55,6,2,5,18,69,2,6,256];
$collection = new SomeCollection($arr);

Sorter::someSort($collection, 'AVERS');