<?php

interface Door
{
    public function open($password);
    public function close();
}

class SimpleDoor implements Door
{
    public function open($password)
    {
        echo 'Open the door!';
    }
    public function close()
    {
        echo 'Close the door!';
    }
}

class SecuredDoor implements Door
{
    protected $door;

    public function __construct(Door $door)
    {
        $this->door = $door;
    }

    public function open($password)
    {
        if ($this->check($password)) {
            $this->door->open($password);
        }
        else {
            echo "Incorrect password! Try again.";
        }
    }

    public function check($password)
    {
        return $password === '123';
    }

    public function close()
    {
        $this->door->close();
    }
}

$door = new SecuredDoor(new SimpleDoor());
$door->open('1234');
echo PHP_EOL;
echo PHP_EOL;
$door->open('123');
echo PHP_EOL;
$door->close();