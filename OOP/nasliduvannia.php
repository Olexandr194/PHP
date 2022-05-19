<?php

class User
{
    public $name;
    public $password;
    public $email;

    public function __construct($name, $password, $email)
    {
        $this->name = $name;
        $this->password = $password;
        $this->email = $email;
    }

    function getInfo()
    {
        $information = $this->name . ' ' . $this->password . ' ' . $this->email;
        return $information;
    }
}

class Admin extends User
{
    public $permission;

    public function __construct($name, $password, $email, $permission)
    {
        parent::__construct($name, $password, $email);
        $this->permission = $permission;
    }

    /*public function __construct($permission)
    {
     $this->permission = $permission;
    }*/

    function getInfo()
    {
        $information = parent::getInfo();
        $information .= ' ' . $this->permission;
        return $information;
    }
}

$user1 = new Admin('Alexandr', 123, 'email@ukr.net', 0);
echo $user1->getInfo();


/*$user2 = new Admin(0);*/