<?php

namespace App\Service;


use JetBrains\PhpStorm\Pure;

final class OperationService
{
    protected AddOperationService $addOperation;
    private SubtractOperation $subtractOperation;
    private MultiplyOperation $multiplyOperation;
    private DivideOperation $divideOperation;


    public function __construct(
        AddOperationService $addOperation,
        SubtractOperation $subtractOperation,
        MultiplyOperation $multiplyOperation,
        DivideOperation $divideOperation
    )
    {
        $this->addOperation = $addOperation;
        $this->subtractOperation = $subtractOperation;
        $this->multiplyOperation = $multiplyOperation;
        $this->divideOperation = $divideOperation;
    }

    #[Pure] public function getResult($operation, $operatorA, $operatorB): string|int|float
    {
        return match ($operation) {
            'add' => $this->addOperation->calculate(intval($operatorA), intval($operatorB)),
            'subtract' => $this->subtractOperation->calculate(intval($operatorA), intval($operatorB)),
            'multiply' => $this->multiplyOperation->calculate(intval($operatorA), intval($operatorB)),
            'divide' => $this->divideOperation->calculate(intval($operatorA), intval($operatorB)),
        };
    }
}