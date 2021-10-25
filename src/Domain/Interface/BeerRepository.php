<?php

namespace App\Domain\Interface;

interface BeerRepository
{
    public function searchByCriteria(FoodQuery $query): array;
}
