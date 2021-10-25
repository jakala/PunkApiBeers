<?php

declare(strict_types=1);

namespace App\Domain\ValueObject;

use App\Shared\Domain\ValueObject\Time;
use DateTime;

final class FirstBrewed extends Time
{
    public const DEFAULT_FORMAT = 'm/Y';

    public static function createFromString(string $value): FirstBrewed
    {
        return new self(Datetime::createFromFormat(self::DEFAULT_FORMAT, $value));
    }

    public function value(): string
    {
        return $this->time->format(self::DEFAULT_FORMAT);
    }
}
