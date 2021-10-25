<?php

declare(strict_types=1);

namespace App\Tests\Infrastructure\Service;

use App\Infrastructure\Service\Configuration;
use PHPUnit\Framework\TestCase;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

final class ConfigurationTest extends TestCase
{
    /** @test */
    /** @test */
    public function should_response_true(): void
    {
        $bag = $this->getParameterBag();
        $configuration = new Configuration($bag);

        $host = $configuration->host();
        $beersUrl = $configuration->beersUrl();

        $this->assertEquals('host', $host);
        $this->assertEquals('beers', $beersUrl);
    }

    private function getParameterBag(): ParameterBagInterface
    {
        $bag = $this->createMock(ParameterBagInterface::class);
        $punkapi = [
            'host' => 'host',
            'beers' => 'beers'
        ];
        $bag
            ->method('get')
            ->with('punkapi')
            ->willReturn($punkapi);

        return $bag;
    }
}
