<?php

namespace App\Tests\Service;


use App\Service\AddOperationService;
use PHPUnit\Framework\TestCase;

class AddOperationTest extends TestCase
{
    /**
     * @dataProvider addProvider
     */
    public function testCalculateAddTheOperatorAAndOperatorB(int $operatorA, int $operatorB, $result): void
    {
        $AddOperation = new AddOperationService;
        $expected = $AddOperation->calculate($operatorA, $operatorB);
        $this->assertEquals($expected, $result);
    }

    public function addProvider(): array
    {
        return [
            [-1, 4, 3],
            [5, 6, 11],
            [5, -1, 4],
            [1, 1, 2]
        ];
    }
}
