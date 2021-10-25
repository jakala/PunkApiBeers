<?php

declare(strict_types=1);

namespace App\Application\Command;

use App\Domain\ValueObject\Food;

final class FoodQuery
{
    public function __construct(private Food $food)
    {
    }

    public function food(): Food
    {
        return $this->food;
    }
}
