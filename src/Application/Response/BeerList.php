<?php

declare(strict_types=1);

namespace App\Application\Response;

final class BeerList implements \JsonSerializable
{
    private array $beers;
    public function __construct(BeerBasic ...$list)
    {
        $this->beers = $list;
    }

    public function jsonSerialize(): array
    {
        return $this->beers;
    }
}
