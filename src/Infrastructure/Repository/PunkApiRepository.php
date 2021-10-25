<?php

declare(strict_types=1);

namespace App\Infrastructure\Repository;

use App\Application\Command\FoodQuery;
use App\Application\Command\IdQuery;
use App\Domain\Interface\BeersRepository;
use App\Infrastructure\Exception\ClientException;
use App\Infrastructure\Service\Configuration;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

final class PunkApiRepository implements BeersRepository
{
    private Client $client;
    public function __construct(private Configuration $config)
    {
        $this->client = new Client();
    }

    public function searchByCriteria(FoodQuery $foodQuery): array
    {
        $url = sprintf(
            '%s%s?%s',
            $this->config->host(),
            $this->config->beersUrl(),
            http_build_query(['food' => $foodQuery->food()?->value()])
        );

        try {
            $results = $this->client->get($url)->getBody()->getContents();
            return json_decode($results, true, JSON_THROW_ON_ERROR);
        } catch (GuzzleException $e) {
            throw new ClientException($e);
        }
    }

    public function findById(IdQuery $idQuery): array
    {
        $url = sprintf(
            '%s%s/%s',
            $this->config->host(),
            $this->config->beersUrl(),
            $idQuery->id()->value()
        );

        try {
            $results = $this->client->get($url)->getBody()->getContents();
            $list = json_decode($results, true, JSON_THROW_ON_ERROR);
            return $list[0];
        } catch (GuzzleException $e) {
            throw new ClientException($e);
        }
    }
}
