<?php

declare(strict_types=1);

namespace App\Infrastructure\Controller;

use App\Application\Handler\SearchBeersHandler;
use App\Application\Service\CreateFoodQueryFromRequest;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

final class SearchBeersController
{
    public function __construct(
        private CreateFoodQueryFromRequest $createFoodQueryFromRequest,
        private SearchBeersHandler $searchBeers
    ) {
    }

    public function __invoke(Request $request): JsonResponse
    {
        $command = $this->createFoodQueryFromRequest->__invoke($request);

        $list = $this->searchBeers->__invoke($command);

        return new JsonResponse($list);
    }
}
