<?php

declare(strict_types=1);

namespace App\Infrastructure\Service;

use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

final class Configuration
{
    private string $host;
    private string $beersUrl;

    public function __construct(ParameterBagInterface $bag)
    {
        $punkapi = $bag->get('punkapi');
        $this->host = $punkapi['host'];
        $this->beersUrl = $punkapi['beers'];
    }

    public function host(): string
    {
        return $this->host;
    }

    public function beersUrl(): string
    {
        return $this->beersUrl;
    }
}
