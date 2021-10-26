<?php

declare(strict_types=1);

namespace App\Tests\Application\Handler;

use App\Application\Command\FoodQuery;
use App\Application\Handler\SearchBeersHandler;
use App\Application\Response\BeerList;
use App\Application\Service\CreateBeerListFromResult;
use App\Domain\Interface\BeersRepository;
use App\Domain\ValueObject\Food;
use PHPUnit\Framework\TestCase;

final class SearchBeersHandlerTest extends TestCase
{
    /** @test */
    public function should_invoke_service(): void
    {
        $repository = $this->getRepository();
        $createBeerListFromResult = $this->getCreateBeerListFromResult();
        $foodQuery = $this->getFoodQuery();

        $handler = new SearchBeersHandler($repository, $createBeerListFromResult);

        $response = $handler->__invoke($foodQuery);

        $this->assertInstanceOf(BeerList::class, $response);
        $response->jsonSerialize();
    }

    private function getRepository(): BeersRepository
    {
        $repository = $this->createMock(BeersRepository::class);

        $list = [
            [
                'id' => 1,
                'name' => 'Cruzcampo',
                'description' => 'una cerveza cruzcampo...',
                'image_url' => 'http://domain.tld/image1.jpg',
                'tagline' => 'cerveza, cruzcampo, cerveceros, mundo',
                'first_brewed' => '07/2010'
            ],
            [
                'id' => 2,
                'name' => 'Amstel',
                'description' => 'Amigo Mio Solo Tu Encuentras Leña',
                'image_url' => 'http://domain.tld/image2.jpg',
                'tagline' => 'cerveza, amstel, amigos, leña, camping',
                'first_brewed' => '01/2021'

            ],
        ];
        $repository
            ->method('searchByCriteria')
            ->willReturn($list);

        return $repository;
    }

    private function getCreateBeerListFromResult(): CreateBeerListFromResult
    {
        return new CreateBeerListFromResult();
    }

    private function getFoodQuery(): FoodQuery
    {
        return new FoodQuery(new Food('meal'));
    }
}
