<?php

declare(strict_types=1);

namespace App\Tests\Infrastructure\Controller;

use App\Application\Command\IdQuery;
use App\Application\Handler\SearchBeerDetailHandler;
use App\Domain\ValueObject\Id;
use App\Infrastructure\Controller\HealthCheckController;
use App\Infrastructure\Controller\ShowBeerDetailController;
use App\Infrastructure\Service\CreateIdQueryFromRequestId;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\JsonResponse;

final class HealthCheckControllerTest extends TestCase
{
    /** @test */
    public function should_response_true(): void
    {
        $controller = new HealthCheckController();

        $response = $controller->__invoke();

        $this->assertInstanceOf(JsonResponse::class, $response);
        $result = json_decode($response->getContent(), true);

        $this->assertArrayHasKey('status', $result);
        $this->assertEquals("ok", $result['status']);
    }
}
