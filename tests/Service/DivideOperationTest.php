<?php

namespace App\Tests\Service;

use App\Service\DivideOperation;
use PHPUnit\Framework\TestCase;

class DivideOperationTest extends TestCase
{
    /**
     * @dataProvider divProvider
     */
    public function testCalculateDivideTheOperatorAAndOperatorB(int $operatorA, int $operatorB, $result): void
    {
        $divideOperation = new DivideOperation;
        $expected = $divideOperation->calculate($operatorA,$operatorB);
        $this->assertEquals($expected, $result);
    }

    public function divProvider(): array
    {
        return [
            [10, 2, 5],
            [6, 5, 1.2],
            [1, 1, 1],
            [1, 0, 'INF']
        ];
    }
}
