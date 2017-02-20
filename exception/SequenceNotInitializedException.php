<?php

namespace Lzr\Fibonacci;

use Exception;

class SequenceNotInitializedException extends Exception
{
    public function __construct()
    {
        parent::__construct('Sequence not initialized');
    }
}
