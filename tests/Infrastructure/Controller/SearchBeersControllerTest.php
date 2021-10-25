<?php

declare(strict_types=1);

namespace App\Tests\Infrastructure\Controller;

use App\Application\Command\FoodQuery;
use App\Application\Handler\SearchBeersHandler;
use App\Application\Response\BeerList;
use App\Domain\ValueObject\Food;
use App\Infrastructure\Controller\SearchBeersController;
use App\Infrastructure\Service\CreateFoodQueryFromRequest;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

final class SearchBeersControllerTest extends TestCase
{
    /** @test */
    public function should_invoke_handler(): void
    {
        $request = $this->getRequest();
        $service = $this->getCreateFoodQueryFromRequest();
        $handler = $this->getHandler();

        $controller = new SearchBeersController($service, $handler);

        $response = $controller->__invoke($request);

        $this->assertInstanceOf(JsonResponse::class, $response);
    }

    private function getRequest(): Request
    {
        $request = $this->createMock(Request::class);
        $request
            ->method('get')
            ->with('food')
            ->willReturn('meal');
        return $request;
    }

    private function getCreateFoodQueryFromRequest(): CreateFoodQueryFromRequest
    {
        return new CreateFoodQueryFromRequest();
    }

    private function getHandler(): SearchBeersHandler
    {
        $handler = $this->createMock(SearchBeersHandler::class);
        $foodQuery = new FoodQuery(new Food('meal'));
        $handler
            ->method('__invoke')
            ->with($foodQuery);
        return $handler;
    }
}
