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

    static function quickSort(SomeCollection $collection, $type) //
    {
        foreach ($collection as $v){
            self::$arr[] = $v;
        }

        if ($type == 'AVERS') {
            if (count(self::$arr) > 1) {
                $base = array_shift(self::$arr);
                $start = [];
                $end = [];
                foreach (self::$arr as $v) {
                    if ($v >= $base) {
                        $start[] = $v;
                    } elseif ($v < $base) {
                        $end[] = $v;
                    }
                }
                return array_merge(self::quickSort($start, 'AVERS'), array(key(self::$arr) => $base), self::quickSort($end, 'AVERS'));
            }
            $start = microtime(true);
            var_dump(self::$arr);
            echo PHP_EOL;
            $done = (round(microtime(true) - $start, 8))*1000;
            echo "Час: " . $done;
        }
        else echo 'Дані введені не вірно';
    }
}

$arr = [5,598,98,59,65,6,55,6,2,5,18,69,2,6,256];
$collection = new SomeCollection($arr);
Sorter::quickSort($collection, 'AVERS');