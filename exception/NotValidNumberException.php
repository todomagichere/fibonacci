<?php

namespace Lzr\Fibonacci;

use Exception;

class NotValidNumberException extends Exception
{
    public function __construct()
    {
        parent::__construct('Not a valid number');
    }

}
