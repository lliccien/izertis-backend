<?php

namespace App\Service;

class MultiplyOperation implements Operation
{

    public function name(): string
    {
        return 'multiply';
    }

    public function calculate($operatorA, $operatorB): float|int
    {
        return $operatorA * $operatorB;
    }
}