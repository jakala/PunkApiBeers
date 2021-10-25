<?php

declare(strict_types=1);

namespace App\Tests\Application\Service;

use App\Application\Response\BeerList;
use App\Application\Service\CreateBeerListFromResult;
use PHPUnit\Framework\TestCase;

final class CreateBeerListFromResultTest extends TestCase
{
    /** @test */
    public function should_call_invoke(): void
    {
        $result = $this->getData();
        $service = new CreateBeerListFromResult();

        $beerDetail = $service->__invoke($result);

        $this->assertInstanceOf(BeerList::class, $beerDetail);
    }

    private function getData(): array
    {
        return [
            [
                'id' => 1,
                'name' => 'Cruzcampo',
                'description' => 'una cerveza cruzcampo...',
                'image' => 'http://domain.tld/image1.jpg',
                'tagline' => 'cerveza, cruzcampo, cerveceros, mundo',
                'first-brewed' => '2021-01'
            ],
            [
                'id' => 2,
                'name' => 'Amstel',
                'description' => 'Amigo Mio Solo Tu Encuentras Leña',
                'image' => 'http://domain.tld/image2.jpg',
                'tagline' => 'cerveza, amstel, amigos, leña, camping',
                'first-brewed' => '2020-01'
            ],
        ];
    }
}
