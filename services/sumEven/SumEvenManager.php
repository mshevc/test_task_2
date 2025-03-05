<?php

declare(strict_types = 1);

namespace app\services\sumEven;

use app\services\sumEven\DTO\NumbersDTO;

/**
 * Class SumEvenManager
 *
 * @author Marina Shevchenko
 */
class SumEvenManager
{
    /**
     * Count sum of even numbers.
     *
     * @param NumbersDTO $numbersDTO
     *
     * @return int
     */
    public function generateEvenNumbersSum(NumbersDTO $numbersDTO): int
    {
        $evenSum = 0;
        foreach ($numbersDTO->numbers as $number) {
            if ($number % 2 === 0) {
                $evenSum += $number;
            }
        }

        return $evenSum;
    }
}
