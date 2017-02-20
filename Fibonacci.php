<?php

namespace Lzr\Fibonacci;

use Lzr\Fibonacci\SequenceNotInicialicedException;

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
            throw new SequenceNotInitializedException();
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
            throw new Exception('The max number must be a natural number');
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
