<?php

declare(strict_types = 1);

namespace app\restApi\v1\sumEven;

use app\exceptions\ValidationException;

/**
 * Class InputDataValidator
 *
 * @author Marina Shevchenko
 */
class InputDataValidator
{
    /**
     * Validate raw input data.
     *
     * @param array $data
     *
     * @return void
     * @throws \app\exceptions\ValidationException
     */
    public static function validate(array $data): void
    {
        if (empty($data)) {
            throw new ValidationException('Input data cannot be empty.');
        }

        $numbers = $data[SumEven::KEY_NUMBERS] ?? null;

        if (empty($numbers)) {
            throw new ValidationException(SumEven::KEY_NUMBERS . ' property is required and cannot be empty.');
        }

        foreach ($numbers as $value) {
            if (!is_int($value)) {
                throw new ValidationException('Input data elements must be in integer format.');
            }
        }
    }
}
