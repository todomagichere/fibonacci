<?php

namespace Lzr\Fibonacci;

use \Exception;

class Fibonacci
{
    private $maxNumber = null;
    private $sequence = null;

    public function __construct($maxNumber)
    {
        $this->setMaxNumber($maxNumber);
    }

    public function getSequence()
    {
        if (is_null($this->sequence)) {
            throw new Exception('Sequence not initialized');
        }
        return $this->sequence;
    }

    public function setMaxNumber($maxNumber)
    {
        if (!is_int($maxNumber)) {
            throw new Exception('The max number must be a natural number');
        }
        $this->maxNumber = $maxNumber;
    }

    public function getMaxNumber()
    {
        if (is_null($this->maxNumber)) {
            throw new Exception('Max number not initialized');
        }
        return $this->maxNumber;
    }


}
