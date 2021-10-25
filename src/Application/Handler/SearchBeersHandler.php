<?php

declare(strict_types=1);

namespace App\Application\Handler;

use App\Application\Command\FoodQuery;
use App\Domain\Interface\BeersRepository;

final class SearchBeersHandler
{
    public function __construct(
        private BeersRepository $memoryRepository
    ) {
    }

    public function __invoke(FoodQuery $query): array
    {
        return $this->memoryRepository->searchByCriteria($query);
    }
}
