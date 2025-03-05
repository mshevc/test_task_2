<?php

declare(strict_types = 1);

namespace app\tests\unit\sumEven;

use app\services\sumEven\DTO\NumbersDTO;
use app\services\sumEven\SumEvenManager;
use PHPUnit\Framework\TestCase;

/**
 * Class SumEvenTest
 *
 * @author Marina Shevchenko
 */
class SumEvenManagerTest extends TestCase
{
    /**
     * @return void
     *
     * @dataProvider dataProviderGenerateEvenNumbersSum
     */
    public function testGenerateEvenNumbersSum(array $input, int $expectedResult): void
    {
        $sumEvenManager = new SumEvenManager();
        $numbers = new NumbersDTO(...$input);

        $this->assertEquals($expectedResult, $sumEvenManager->generateEvenNumbersSum($numbers));
    }

    public function dataProviderGenerateEvenNumbersSum(): array
    {
        return [
            'single odd element array' => [
                [9],
                0,
            ],
            'single even element array' => [
                [4],
                4,
            ],
            'only even elements array' => [
                [4, 8, 10],
                22,
            ],
            'only odd elements array' => [
                [1, 3, 5],
                0,
            ],
            'even and odd elements array' => [
                [1, 2, 5, 8, 11],
                10,
            ],
            'even and odd elements array with zero' => [
                [1, 2, 5, 8, 11, 0],
                10,
            ],
        ];
    }
}
