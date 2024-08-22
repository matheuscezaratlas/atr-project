<?php

namespace App\Services\Api\Contracts;

use Psr\Http\Message\ResponseInterface;

interface EventApiServiceContract
{
    public function getEvent(int $eventId): ResponseInterface;
}
