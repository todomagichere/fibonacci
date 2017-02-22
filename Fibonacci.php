<?php

namespace Lzr\Fibonacci;

use Exception;

/**
 * This class handle the fibonacci sequence
 * to make maths and software development more fun
 */
class Fibonacci
{
    /**
     * Check if is a valid number
     *
     * @param int $n Index to get from fibonacci sequence
     * @throws Exception if is not a valid number
     */
    public function checkNumber($n)
    {
        if (!is_numeric($n)) {
            throw new Exception($n . "is not a valid number");
        }
        
        if ($n < 0) {
            throw new Exception($n . " is not a valid index");
        }
    }

    public function getSequence($n)
    {
        $this->checkNumber($n);

        $sequence = array(0,1);
        for ($i = 1; $i < $n; $i++) {
            $sequence[] = $sequence[$i] + $sequence[$i-1];
        }

        echo "<pre>";
        print_r($sequence);
        echo "</pre>";
    }

    /**
     * Get the nth fibonacci number using exponential complexity.
     * This is a very low algorithm, probably a
     * max execution time error exception will be thrown.
     *
     * @param int $n index of fibonacci number sequence
     * @return int element in the nth position
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
     * Get the nth fibonacci number using linear complexity
     *
     * @param int $n index of fibonacci number sequence
     * @return int elementin the nth position
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
     * Get the nth fibonacci number using logarithmic complexity
     *
     * @param int $n index of fibonacci number sequence
     * @return int element in the nth position
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
     * @return int element
     * @throws Exception If complexity is not defined, throw an exception
     */
    public function getElementByIndex($n, $complexity = 'logarithmic')
    {
        $this->checkNumber($n);

        switch ($complexity) {
            case 'logarithmic':
                $element = $this->getElementLogarithmicComplexity($n);
                break;
            case 'exponential':
                $element = $this->getElementExponentialComplexity($n);
                break;
            case 'linear':
                $element = $this->getElementLinearComplexity($n);
                break;
            default:
                throw new Exception('complexity not defined');
        }
        
        return $element;
    }
}
