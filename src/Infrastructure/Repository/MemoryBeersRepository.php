<?php

declare(strict_types=1);

namespace App\Infrastructure\Repository;

use App\Application\Command\FoodQuery;
use App\Domain\Interface\BeersRepository;

final class MemoryBeersRepository implements BeersRepository
{
    public function searchByCriteria(FoodQuery $query): array
    {
        return [
            ['id' => 1, 'name' => 'Cruzcampo', 'description' => 'una cerveza cruzcampo...'],
            ['id' => 1, 'name' => 'Amstel', 'description' => 'Amigo Mio Solo Tu Encuentras Leña'],
        ];
    }
}
