<?php

declare(strict_types=1);

namespace App\Infrastructure\Exception;

use Exception;

final class ClientException extends Exception
{
    public function __construct(Exception $e)
    {
        parent::__construct();
        $this->message = 'Connection to punkApi error: ' . $e->getMessage();
    }
}
