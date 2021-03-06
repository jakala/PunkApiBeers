<?php

declare(strict_types=1);

namespace App\Shared\Domain\ValueObject;

use App\Shared\Domain\Exception\TimeError;
use App\Shared\Domain\Interface\ValueObject;
use DateTime;

class Time implements ValueObject
{
    public const FORMAT = 'Y-m-d';

    public function __construct(protected Datetime $time)
    {
    }

    public function value(): mixed
    {
        return $this->time->format($this::FORMAT);
    }

    public function check(mixed $value): void
    {
        if (is_null($value)) {
            throw new TimeError($value);
        }
    }
}
