<?php

namespace App\Service;

class SubtractOperation implements Operation
{

    public function name(): string
    {
        return 'subtract';
    }

    public function calculate($operatorA, $operatorB)
    {
        return $operatorA - $operatorB;
    }
}