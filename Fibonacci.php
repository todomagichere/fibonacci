<?php

namespace Lzr\Fibonacci;

use Exception;

class Fibonacci
{
    private $index = null;
    private $sequence = array(1);

    public function __construct($index = null)
    {
        $this->index = $index;
        $this->checkNumber($index);
    }

    public function getSequence()
    {
        //TODO magic here
    }

    public function initSequence()
    {
        $this->sequence = true;
    }

    public function setMaxNumber($index)
    {
        if (!is_int($index)) {
            throw new Exception('Invalid number');
        }
        $this->index = $index;
    }

    public function getMaxNumber()
    {
        if (is_null($this->index)) {
            throw new Exception('Max number not initialized');
        }
        return $this->index;
    }

    /**
     * Check if is a valid number
     * @param int $n
     * @throws Exception Throws an exception if is not a valid number
     */
    public function checkNumber($n)
    {
        if ($n < 0) {
            throw new Exception($n . ' is not a valid index');
        }
    }

    /**
     * Get the nth element using exponential complexity
     * @param int $n
     * @return int
     */
    private function getElementExponentialComplexity($n)
    {
        if ($n < 2) {
            return $n;
        } else {
            return ($this->getElementExponentialComplexity($n - 1) + $this->getElementExponentialComplexity($n - 2));
        }
    }

    /**
     * Get the nth element using linear complexity
     * @param int $n
     * @return int
     */
    private function getElementLinearComplexity($n)
    {
        $i = 1;
        $j = 0;
        $counter = $n - 1;
        for ($k = 0; $k <= $counter; $k++) {
            $t = $i + $j;
            $j = $i;
            $i = $t;
        }
        return $j;
    }

    /**
     * Get the nth element using logarithmic complexity
     * @param int $n
     * @return int
     */
    private function getElementLogarithmicComplexity($n)
    {
        if ($n <= 0) {
            return 0;
        }
        $i = $n - 1;
        $auxOne = 0;
        $auxTwo = 1;
        $a = $auxTwo;
        $b = $auxOne;
        $c = $auxOne;
        $d = $auxTwo;
        while ($i > 0) {
            if ($i % 2 != 0) {
                $auxOne = (($d*$b) + ($c*$a));
                $auxTwo = ($d*($b + $a) + $c*$b);
                $a = $auxOne;
                $b = $auxTwo;
            }
            $auxOne = (pow($c, 2) + pow($d, 2));
            $auxTwo = ($d*(2*$c + $d));
            $c = $auxOne;
            $d = $auxTwo;
            $i = $i / 2;
        }
        return ($a + $b);
    }

    /**
     * Get the nth fibonacci number
     * using a determinate computational complexity
     *
     * @param int $n nth element to get
     * @param string $complexity Values can be: 'logarithmic', 'linear' or 'exponential'
     * @return int
     * @throws Exception If complexity is not defined, throw an exception
     */
    public function getElementByIndex($n, $complexity = 'logarithmic')
    {
        $this->checkNumber($n);

        switch ($complexity) {
            case 'logarithmic':
                return $this->getElementLogarithmicComplexity($n);
            case 'exponential':
                return $this->getElementExponentialComplexity($n);
            case 'linear':
                return $this->getElementLinearComplexity($n);
            default:
                throw new Exception('complexity not defined');
        }
    }
}
