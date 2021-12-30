<?php

namespace App\Service;

final class AddOperationService implements Operation
{

    public function name(): string
    {
        return 'add';
    }

    public function calculate($operatorA, $operatorB): int
    {
        return $operatorA + $operatorB;
    }


}