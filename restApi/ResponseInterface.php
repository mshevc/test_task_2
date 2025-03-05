<?php

namespace app\restApi;

/**
 * Interface RestInterface
 *
 * @author Marina Shevchenko
 */
interface ResponseInterface
{
    /**
     * Set response status code.
     *
     * @return int
     */
    public function getStatusCode(): int;

    /**
     * Set response status message.
     *
     * @return string
     */
    public function getStatusMessage(): string;
}