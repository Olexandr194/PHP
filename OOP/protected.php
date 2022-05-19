<?php
class Test {
    public $testPublic = 'Public';
    protected $testProtected = 'Protected';
    private $testPrivate;
    final function testFinale(){
        echo 'Finale';
}
}

class Test1 extends Test {
    public function someFunction() {

        echo $this->testPublic;
    }
}

class Test2 extends Test {
    public function someFunction() {

        $this->testProtected = 'Protected';
        echo $this->testProtected;
    }
}


$obj1 = new Test1();
$obj1->testPublic = 'PublicEdited';


$obj1->someFunction();

/*$obj2 = new Test2();
$obj2->someFunction();*/

