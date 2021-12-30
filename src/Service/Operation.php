<?php

namespace App\Service;

interface Operation
{
    public function name(): string;

    public function calculate($operatorA, $operatorB);

}