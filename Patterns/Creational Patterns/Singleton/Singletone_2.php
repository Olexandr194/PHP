<?php
class Singleton
{
    private static
        $instance = null;

    public static function getInstance()
    {
        if (null === self::$instance)
        {
            self::$instance = new self();
        }
        return self::$instance;
    }
    private function __clone() {}
    private function __construct() {}

    public function test()
    {
        echo "SOME FUNCTION" . PHP_EOL;
    }
}
$Object = Singleton::getInstance();


$Object -> test();
Singleton::getInstance() -> test();

