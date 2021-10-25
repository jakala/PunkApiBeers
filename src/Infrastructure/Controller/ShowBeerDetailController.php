<?php

declare(strict_types=1);

namespace App\Infrastructure\Controller;

use App\Application\Handler\SearchBeerDetailHandler;
use App\Infrastructure\Service\CreateIdQueryFromRequestId;
use Symfony\Component\HttpFoundation\JsonResponse;

final class ShowBeerDetailController
{
    public function __construct(
        private CreateIdQueryFromRequestId $createIdFromRequestId,
        private SearchBeerDetailHandler $beerDetailHandler
    ) {
    }

    public function __invoke(int $requestId): JsonResponse
    {
        $idQuery = $this->createIdFromRequestId->__invoke($requestId);
        $beerDetail = $this->beerDetailHandler->__invoke($idQuery);

        return new JsonResponse($beerDetail);
    }
}
