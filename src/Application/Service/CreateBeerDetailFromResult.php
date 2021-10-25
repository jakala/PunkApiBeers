<?php

declare(strict_types=1);

namespace App\Application\Service;

use App\Application\Response\BeerDetail;
use App\Domain\ValueObject\Beer;
use App\Domain\ValueObject\Description;
use App\Domain\ValueObject\FirstBrewed;
use App\Domain\ValueObject\Id;
use App\Domain\ValueObject\Image;
use App\Domain\ValueObject\Name;
use App\Domain\ValueObject\Tagline;

final class CreateBeerDetailFromResult
{
    public function __invoke(array $result): BeerDetail
    {
        $beer = new Beer(
            new Id($result['id']),
            new Name($result['name']),
            new Description($result['description']),
            new Image($result['image']),
            new Tagline($result['tagline']),
            FirstBrewed::createFromString($result['first-brewed'])
        );

        return new BeerDetail($beer);
    }
}
