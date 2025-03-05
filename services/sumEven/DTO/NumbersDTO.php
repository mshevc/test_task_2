<?php

declare(strict_types = 1);

namespace app\services\sumEven\DTO;

/**
 * Class NumbersDTO
 *
 * @author Marina Shevchenko
 */
readonly class NumbersDTO
{
    public array $numbers;

    public function __construct(
        int ...$numbers,
    ) {
        $this->numbers = $numbers;
    }
}
