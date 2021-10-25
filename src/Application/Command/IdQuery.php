<?php

declare(strict_types=1);

namespace App\Application\Command;

use App\Domain\ValueObject\Id;

final class IdQuery
{
    public function __construct(private Id $id)
    {
    }

    public function food(): id
    {
        return $this->id;
    }
}
