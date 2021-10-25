<?php

declare(strict_types=1);

namespace App\Application\Handler;

use App\Application\Command\IdQuery;
use App\Application\Response\BeerDetail;
use App\Application\Service\CreateBeerDetailFromResult;
use App\Domain\Interface\BeersRepository;

final class SearchBeerDetailHandler
{
    public function __construct(
        private BeersRepository $memoryRepository,
        private CreateBeerDetailFromResult $createBeerDetailFromResult
    ) {
    }

    public function __invoke(IdQuery $query): BeerDetail
    {
        $result = $this->memoryRepository->findById($query);

        return $this->createBeerDetailFromResult->__invoke($result);
    }
}
