<?php

interface Employee
{
    public function __construct($name, $salary);
    public function getName();
    public function setSalary($salary);
    public function getSalary();
    public function getRoles();
}

class Developer implements Employee
{
    protected $salary;
    protected $name;
    protected $role;

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

    public function getRoles()
    {
        return $this->role;
    }
}

class Designer implements Employee
{
    protected $salary;
    protected $name;
    protected $role;

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

    public function getRoles()
    {
        return $this->role;
    }
}

class Organization
{
    protected $employees;

    public function addEmployee(Employee $employee)
    {
        $this->employees[] = $employee;
    }

    public function getNetSalaries()
    {
        $netSalary = 0;

        foreach ($this->employees as $employee) {
            $netSalary += $employee->getSalary();
        }
        return $netSalary;
    }
}

$man1 = new Developer('name1', 489);
$man2 = new Developer('name2', 4849);
$man3 = new Developer('name3', 4894);

$man4 = new Designer('name4', 749);
$man5 = new Designer('name5', 649);

$organization = new Organization();
$organization->addEmployee($man1);
$organization->addEmployee($man2);
$organization->addEmployee($man3);
$organization->addEmployee($man4);
$organization->addEmployee($man5);

echo $organization->getNetSalaries();