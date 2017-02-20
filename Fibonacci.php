<?php

namespace Lzr\Fibonacci;

use Exception;

class Fibonacci
{
    private $maxNumber = null;
    private $sequence = array(1);

    public function __construct($maxNumber = null)
    {
        $this->maxNumber = $maxNumber;
    }

    public function getSequence()
    {
        if (is_null($this->maxNumber)) {
            throw new Exception('Max number not initialized');
        }
        if (!$this->sequence) {
            throw new Exception('Sequence not initialized');
        }
        return $this->sequence;
    }

    public function initSequence()
    {
        $this->sequence = true;
    }

    public function setMaxNumber($maxNumber)
    {
        if (!is_int($maxNumber)) {
            throw new Exception('Invalid number');
        }
        $this->maxNumber = $maxNumber;
    }

    public function getMaxNumber()
    {
        if (is_null($this->maxNumber)) {
            throw new MaxNumberNotInitializedException();
        }
        return $this->maxNumber;
    }
}
