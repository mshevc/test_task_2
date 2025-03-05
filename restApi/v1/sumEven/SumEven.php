<?php

declare(strict_types = 1);

namespace app\restApi\v1\sumEven;

use app\exceptions\ValidationException;
use app\restApi\ResponseInterface;
use app\restApi\v1\BaseRest;
use app\restApi\v1\Response;
use app\services\sumEven\DTO\NumbersDTO;
use app\services\sumEven\SumEvenManager;

/**
 * Class SumEven
 */
class SumEven extends BaseRest
{
    public const string KEY_NUMBERS = 'numbers';
    public const string KEY_SUM = 'sum';

    /**
     * @inheritDoc
     * @return \app\restApi\ResponseInterface
     * @throws \JsonException
     * @throws \app\exceptions\NotSetException
     */
    public function create(): ResponseInterface
    {
        $inputData = $this->getInputData();
        try {
            InputDataValidator::validate($inputData);
        } catch (ValidationException $e) {
            return new Response(400, $e->getMessage());
        }

        $sum = new SumEvenManager()->generateEvenNumbersSum(
            new NumbersDTO(...$inputData[self::KEY_NUMBERS])
        );

        return new Response(201, json_encode([self::KEY_SUM => $sum], JSON_THROW_ON_ERROR));
    }
}
