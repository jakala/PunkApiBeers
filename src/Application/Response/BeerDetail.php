<?php

declare(strict_types=1);

namespace App\Application\Response;

use App\Domain\ValueObject\Beer;

final class BeerDetail implements \JsonSerializable
{
    public function __construct(private Beer $beer)
    {
    }

    public function jsonSerialize()
    {
        return [
            'id' => $this->beer->id()->value(),
            'name' => $this->beer->name()->value(),
            'description' => $this->beer->description()?->value(),
            'image' => $this->beer->description()?->value(),
            'tagline' => $this->beer->tagline()?->value(),
            'first_brewed' => $this->beer->firstBrewed()?->value(),
        ];
    }
}
