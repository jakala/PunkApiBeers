<?php

declare(strict_types=1);

namespace App\Infrastructure\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

final class SearchBeersController
{
    public function __invoke(Request $request): JsonResponse
    {
        $list = [
            ['id' => 1, 'name' => 'Cruzcampo', 'description' => 'una cerveza cruzcampo...'],
            ['id' => 1, 'name' => 'Amstel', 'Description' => 'Amigo Mio Solo Tu Encuentras Leña'],
        ];

        return new JsonResponse($list);
    }
}
