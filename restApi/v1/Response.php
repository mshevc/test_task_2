<?php

declare(strict_types = 1);

namespace app\restApi\v1;

use app\restApi\ResponseInterface;

/**
 * Class Response
 *
 * @author Marina Shevchenko
 */
readonly class Response implements ResponseInterface
{
    public function __construct(
        private int    $statusCode,
        private string $message,
    ) {
    }

    /**
     * @inheritDoc
     */
    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    /**
     * @inheritDoc
     */
    public function getStatusMessage(): string
    {
        return $this->message;
    }
}
