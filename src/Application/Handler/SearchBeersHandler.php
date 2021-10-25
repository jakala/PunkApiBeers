<?php

declare(strict_types=1);

namespace App\Application\Handler;

use App\Application\Command\FoodQuery;

final class SearchBeersHandler
{
    public function __construct()
    {
    }

    public function __invoke(FoodQuery $query): array
    {
        $list = [
            ['id' => 1, 'name' => 'Cruzcampo', 'description' => 'una cerveza cruzcampo...'],
            ['id' => 1, 'name' => 'Amstel', 'Description' => 'Amigo Mio Solo Tu Encuentras Leña'],
        ];

        return $list;
    }
}
