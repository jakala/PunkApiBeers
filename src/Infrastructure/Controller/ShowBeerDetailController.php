<?php

declare(strict_types=1);

namespace App\Infrastructure\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;

final class ShowBeerDetailController
{
    public function __construct()
    {
    }

    public function __invoke(int $id): JsonResponse
    {
        $beerDetail = [
            [
                'id' => 1,
                'name' => 'Cruzcampo',
                'description' => 'una cerveza cruzcampo...',
                'image' => 'http://domain.tld/image1.jpg',
                'tagline' => 'cerveza, cruzcampo, cerveceros, mundo',
                'first-brewed' => '2021-01'
            ]
        ];
        return new JsonResponse($beerDetail);
    }
}
