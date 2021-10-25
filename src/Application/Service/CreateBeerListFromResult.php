<?php

declare(strict_types=1);

namespace App\Application\Service;

use App\Application\Response\BeerBasic;
use App\Application\Response\BeerList;
use App\Domain\ValueObject\Beer;
use App\Domain\ValueObject\Description;
use App\Domain\ValueObject\Id;
use App\Domain\ValueObject\Name;

final class CreateBeerListFromResult
{
    public function __invoke(array $beers): BeerList
    {
        $list = [];
        foreach ($beers as $beer) {
            $beerBasic = new BeerBasic(
                new Beer(
                    new Id($beer['id']),
                    new Name($beer['name']),
                    new Description($beer['description']),
                    null,
                    null,
                    null
                )
            );

            $list[] = $beerBasic;
        }

        return new BeerList(...$list);
    }
}
