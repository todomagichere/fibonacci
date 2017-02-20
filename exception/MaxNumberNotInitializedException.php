<?php

namespace Lzr\Fibonacci;

use Exception;

class MaxNumberNotInitializedException extends Exception
{
    public function __construct()
    {
        parent::__construct('Max number not initialized');
    }
}
