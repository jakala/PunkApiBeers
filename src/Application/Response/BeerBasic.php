<?php

declare(strict_types=1);

namespace App\Application\Response;

use App\Domain\ValueObject\Beer;

final class BeerBasic implements \JsonSerializable
{
    public function __construct(private Beer $beer)
    {
    }

    public function jsonSerialize()
    {
        return [
            'id' => $this->beer->id()->value(),
            'name' => $this->beer->name()->value(),
            'description' => $this->beer->description()->value(),
        ];
    }
}
