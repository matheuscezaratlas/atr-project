<?php

namespace App\Services\Api\Contracts;

use Psr\Http\Message\ResponseInterface;

interface SubscriptionApiServiceContract
{
    public function getSubscriptionsByEvents(array $eventIds): ResponseInterface;
}
