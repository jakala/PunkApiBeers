<?php

namespace App\Domain\Interface;

use App\Application\Command\FoodQuery;

interface BeersRepository
{
    public function searchByCriteria(FoodQuery $query): array;
}
