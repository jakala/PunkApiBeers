<?php

declare(strict_types=1);

namespace App\Tests\Application\Handler;

use App\Application\Command\IdQuery;
use App\Application\Handler\SearchBeerDetailHandler;
use App\Application\Response\BeerDetail;
use App\Application\Service\CreateBeerDetailFromResult;
use App\Domain\Interface\BeersRepository;
use App\Domain\ValueObject\Id;
use PHPUnit\Framework\TestCase;

final class SearchBeerDetailHandlerTest extends TestCase
{
    /** @test */
    public function should_invoke_service(): void
    {
        $repository = $this->getRepository();
        $createBeerDetailFromResult = $this->getCreateBeerDetailFromResult();
        $idQuery = $this->getIdQuery();

        $handler = new SearchBeerDetailHandler($repository, $createBeerDetailFromResult);

        $response = $handler->__invoke($idQuery);

        $this->assertInstanceOf(BeerDetail::class, $response);
        $response->jsonSerialize();
    }

    private function getRepository(): BeersRepository
    {
        $repository = $this->createMock(BeersRepository::class);

        $detail = [
            'id' => 2,
            'name' => 'Amstel',
            'description' => 'Amigo Mio Solo Tu Encuentras Leña',
            'image_url' => 'http://domain.tld/image2.jpg',
            'tagline' => 'cerveza, amstel, amigos, leña, camping',
            'first_brewed' => '01/2020'
        ];
        $repository
            ->method('findById')
            ->willReturn($detail);

        return $repository;
    }

    private function getCreateBeerDetailFromResult(): CreateBeerDetailFromResult
    {
        $service = new CreateBeerDetailFromResult();

        return $service;
    }

    private function getIdQuery(): IdQuery
    {
        return new IdQuery(new Id(1));
    }
}
