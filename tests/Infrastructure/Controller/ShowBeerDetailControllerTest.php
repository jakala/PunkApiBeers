<?php

declare(strict_types=1);

namespace App\Tests\Infrastructure\Controller;

use App\Application\Command\IdQuery;
use App\Application\Handler\SearchBeerDetailHandler;
use App\Domain\ValueObject\Id;
use App\Infrastructure\Controller\ShowBeerDetailController;
use App\Infrastructure\Service\CreateIdQueryFromRequestId;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\JsonResponse;

final class ShowBeerDetailControllerTest extends TestCase
{
    /** @test */
    public function should_invoke_handler(): void
    {
        $service = $this->getCreateIdQueryFromRequestId();
        $handler = $this->getHandler();

        $controller = new ShowBeerDetailController($service, $handler);

        $response = $controller->__invoke(1);

        $this->assertInstanceOf(JsonResponse::class, $response);
    }

    private function getCreateIdQueryFromRequestId(): CreateIdQueryFromRequestId
    {
        return new CreateIdQueryFromRequestId();
    }

    private function getHandler(): SearchBeerDetailHandler
    {
        $handler = $this->createMock(SearchBeerDetailHandler::class);
        $foodQuery = new IdQuery(new Id(1));
        $handler
            ->method('__invoke')
            ->with($foodQuery);
        return $handler;
    }
}
