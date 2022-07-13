<?php

class MySQL extends mysqli
{

    public function __construct($connectConfig = array())
    {
        @parent::__construct(
            $connectConfig['host'],
            $connectConfig['username'],
            $connectConfig['passwords'],
            $connectConfig['dbname']
        );
        if ($this->connect_error) {
            throw new \Exception (
                $this->connect_error,
                $this->connect_errno
            );
        }
    }
}

