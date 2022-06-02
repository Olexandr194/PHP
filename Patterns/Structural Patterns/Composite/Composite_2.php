<?php

interface Employee
{
    public function __construct($name, $salary);
    public function getName();
    public function setSalary($salary);
    public function getSalary();
}

class Developer implements Employee
{
    protected $salary;
    protected $name;

    public function __construct($name, $salary)
    {
        $this->name = $name;
        $this->salary = $salary;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setSalary($salary)
    {
        $this->salary = $salary;
    }

    public function getSalary()
    {
        return $this->salary;
    }

}

class Designer implements Employee
{
    protected $salary;
    protected $name;

    public function __construct($name, $salary)
    {
        $this->name = $name;
        $this->salary = $salary;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setSalary($salary)
    {
        $this->salary = $salary;
    }

    public function getSalary()
    {
        return $this->salary;
    }

}

class Organization
{
    protected $employees;

    public function addEmployee(Employee $employee)
    {
        $this->employees[] = $employee;
    }

    public function getAllSalaries()
    {
        $netSalary = 0;

        foreach ($this->employees as $employee) {
            $netSalary += $employee->getSalary();
        }
        return $netSalary;
    }
}

function clientCode(Organization $organization)
{
    echo "RESULT: " . $organization->getAllSalaries();
}


$man1 = new Developer('name1', 485);
$man2 = new Developer('name2', 4849);
$man3 = new Developer('name3', 4894);

$man4 = new Designer('name4', 749);
$man5 = new Designer('name5', 568);

$organization = new Organization();
$organization->addEmployee($man1);
$organization->addEmployee($man2);
$organization->addEmployee($man3);
$organization->addEmployee($man4);
$organization->addEmployee($man5);

clientCode($organization);


