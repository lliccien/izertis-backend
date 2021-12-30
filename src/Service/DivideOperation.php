<?php

namespace App\Service;

class DivideOperation implements Operation
{

    public function name(): string
    {
        return 'divide';
    }

    public function calculate($operatorA, $operatorB): float|int|string
    {
        if($operatorB === 0){
            return 'INF';
        }
        return $operatorA / $operatorB;
    }
}