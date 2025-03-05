<?php

declare(strict_types = 1);

namespace app\restApi\v1;

use app\exceptions\NotSetException;
use app\restApi\RestInterface;

/**
 * Class BaseRest
 *
 * @author Marina Shevchenko
 */
abstract class BaseRest implements RestInterface
{
    public readonly array $inputData;

    /**
     * @inheritDoc
     */
    public function setInputData(array $data): void
    {
        $this->inputData = $data;
    }

    /**
     * @inheritDoc
     * @throws \app\exceptions\NotSetException
     */
    public function getInputData(): array
    {
        if (!isset($this->inputData)) {
            throw new NotSetException('Input data not set');
        }

        return $this->inputData;
    }
}
