<?php

namespace App\Domain\Interface;

use App\Application\Command\FoodQuery;
use App\Application\Command\IdQuery;

interface BeersRepository
{
    public function searchByCriteria(FoodQuery $query): array;

    public function findById(IdQuery $id): array;
}
