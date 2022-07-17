<?php

class MySQL extends mysqli
{

    public function __construct($connectConfig = array())
    {
        @parent::__construct(
            $connectConfig['host'] = 'localhost',
            $connectConfig['username'] = 'root',
            $connectConfig['passwords'] = '',
            $connectConfig['dbname'] = 'laravel_shop'
        );
        if ($this->connect_error) {
            throw new \Exception (
                $this->connect_error,
                $this->connect_errno
            );
        }
    }
}

