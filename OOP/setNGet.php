<?php
class Person {

    public $name = 'Alexandr';
    private $age = '30';

    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
    }

    public function getAge()
    {
        return $this->age;
    }
    public function setAge($age)
    {
        if ($this->isAgeCorrect($age)) {
            $this->age = $age;
        }
        else $this->age = 'ERROR';
    }
    private function isAgeCorrect($age)
    {
        return $age >= 18 and $age <= 60;
    }

}

/*$person1 = new Person();
$person1->setName('John');
echo $person1->getName();*/


/*$person1 = new Person();
$person1->setAge(78);

echo $person1->getAge();
*/



