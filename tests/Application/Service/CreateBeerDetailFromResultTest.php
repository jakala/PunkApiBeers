<?php

declare(strict_types=1);

namespace App\Tests\Application\Service;

use App\Application\Response\BeerDetail;
use App\Application\Service\CreateBeerDetailFromResult;
use PHPUnit\Framework\TestCase;

final class CreateBeerDetailFromResultTest extends TestCase
{
    /** @test */
    public function should_call_invoke(): void
    {
        $result = $this->getData();
        $service = new CreateBeerDetailFromResult();

        $beerDetail = $service->__invoke($result);

        $this->assertInstanceOf(BeerDetail::class, $beerDetail);
        $beerDetail->jsonSerialize();
    }

    private function getData(): array
    {
        return [
            'id' => 1,
            'name' => 'Cruzcampo',
            'description' => 'una cerveza cruzcampo...',
            'image_url' => 'http://domain.tld/image1.jpg',
            'tagline' => 'cerveza, cruzcampo, cerveceros, mundo',
            'first_brewed' => '01/2021'
        ];
    }
}
