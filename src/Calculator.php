<?php

class Calculator
{
    public function add(int $x1, int $x2): int
    {
        return $x1 + $x2;
    }
    public function sub(int $x1, int $x2): int
    {
        return $x1 - $x2;
    }
        public function multiply(int $x1, int $x2): int
    {
        return $x1 * $x2;
    }
    public function divide(int $x1, int $x2): int
    {
        if($x2 === 0){
            throw new InvalidArgumentException("Division with 0 is not possible.");
        }
        return $x1 / $x2;
    }

}
