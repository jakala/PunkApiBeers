<?php

declare(strict_types=1);

namespace App\Infrastructure\Repository;

use App\Application\Command\FoodQuery;
use App\Application\Command\IdQuery;
use App\Domain\Interface\BeersRepository;

final class MemoryBeersRepository implements BeersRepository
{
    public function searchByCriteria(FoodQuery $query): array
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

    public function findById(IdQuery $id): array
    {
        return [
            'id' => 1,
            'name' => 'Cruzcampo',
            'description' => 'una cerveza cruzcampo...',
            'image' => 'http://domain.tld/image1.jpg',
            'tagline' => 'cerveza, cruzcampo, cerveceros, mundo',
            'first-brewed' => '2021-01'
        ];
    }
}
