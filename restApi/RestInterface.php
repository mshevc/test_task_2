<?php

namespace app\restApi;

/**
 * Inerface RestInterface
 *
 * @author Marina Shevchenko
 */
interface RestInterface
{
    /**
     * Set input data raw array.
     *
     * @param array $data
     */
    public function setInputData(array $data): void;

    /**
     * Get input data raw array.
     *
     * @return array
     */
    public function getInputData(): array;

    /**
     * Process POST action.
     *
     * @return ResponseInterface
     */
    public function create(): ResponseInterface;
}