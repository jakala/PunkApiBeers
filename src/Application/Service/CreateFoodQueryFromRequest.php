<?php

declare(strict_types=1);

namespace App\Application\Service;

use App\Application\Command\FoodQuery;
use App\Domain\ValueObject\Food;
use Symfony\Component\HttpFoundation\Request;

final class CreateFoodQueryFromRequest
{
    public function __invoke(Request $request): FoodQuery
    {
        $filter = $request->get('food', null);

        $food = !is_null($filter) ? new Food($filter) : null;

        return new FoodQuery($food);
    }
}
