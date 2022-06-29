<?php

class UsersCollection implements IteratorAggregate
{
    protected $user = [];

    public function getUser(Users $users)
    {
        $this->user[] = [
            'id' => $users->id,
            'name' => $users->name,
            'surname' => $users->surname,
            'age' => $users->age
        ];
    }

    public function getIterator()
    {
        yield from $this->user;
    }
}