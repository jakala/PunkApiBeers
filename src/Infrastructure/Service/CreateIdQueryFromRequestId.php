<?php

declare(strict_types=1);

namespace App\Infrastructure\Service;

use App\Application\Command\IdQuery;
use App\Domain\ValueObject\Id;

final class CreateIdQueryFromRequestId
{
    public function __invoke(int $id): IdQuery
    {
        return new IdQuery(
            new Id($id)
        );
    }
}
