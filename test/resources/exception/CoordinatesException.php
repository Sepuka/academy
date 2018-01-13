<?php

namespace sepuka\academy\test\resources\exception;

use Throwable;

class CoordinatesException extends \OutOfRangeException
{
    /** @var array */
    private $coordinates = [];

    public function __construct(array $coordinates, string $message = '', int $code = 0, Throwable $previous = null)
    {
        $this->coordinates = $coordinates;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return array
     */
    public function getCoordinates(): array
    {
        return $this->coordinates;
    }
}
