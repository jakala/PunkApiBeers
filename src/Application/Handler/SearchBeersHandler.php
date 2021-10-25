<?php

declare(strict_types=1);

namespace App\Application\Handler;

use App\Application\Command\FoodQuery;
use App\Application\Response\BeerList;
use App\Application\Service\CreateBeerListFromResult;
use App\Application\Service\CreateFoodQueryFromRequest;
use App\Domain\Interface\BeersRepository;

final class SearchBeersHandler
{
    public function __construct(
        private BeersRepository $memoryRepository,
        private CreateBeerListFromResult $createBeerListFromResult
    ) {
    }

    public function __invoke(FoodQuery $query): BeerList
    {
        $result = $this->memoryRepository->searchByCriteria($query);

        return $this->createBeerListFromResult->__invoke($result);
    }
}
