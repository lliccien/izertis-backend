<?php

namespace App\Tests\Service;

use App\Service\MultiplyOperation;
use PHPUnit\Framework\TestCase;

class MultiplyOperationTest extends TestCase
{
    /**
     * @dataProvider mulProvider
     */
    public function testCalculateMultiplyTheOperatorAAndOperatorB(int $operatorA, int $operatorB, $result): void
    {
        $multiplyOperation = new MultiplyOperation;
        $expected = $multiplyOperation->calculate($operatorA,$operatorB);
        $this->assertEquals($expected, $result);
    }

    public function mulProvider(): array
    {
        return [
            [10, 2, 20],
            [6, 5, 30],
            [1, 1, 1],
            [1, 0, 0]
        ];
    }
}
