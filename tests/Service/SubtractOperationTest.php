<?php

namespace App\Tests\Service;

use App\Service\SubtractOperation;
use PHPUnit\Framework\TestCase;

class SubtractOperationTest extends TestCase
{
    /**
     * @dataProvider subProvider
     */
    public function testCalculateSubtractionTheOperatorAAndOperatorB(int $operatorA, int $operatorB, $result): void
    {
        $subtractOperation = new SubtractOperation;
        $expected = $subtractOperation->calculate($operatorA, $operatorB);
        $this->assertEquals($expected, $result);
    }

    public function subProvider(): array
    {
        return [
            [-1, 4, -5],
            [5, 6, -1],
            [5, -1, 6],
            [1, 1, 0]
        ];
    }
}
