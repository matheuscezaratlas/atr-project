<?php

namespace App\Services\Api;

use App\Services\Api\Contracts\EventApiServiceContract;
use App\Services\Api\Contracts\EventClientContract;
use Psr\Http\Message\ResponseInterface;
use Throwable;

class EventApiService implements EventApiServiceContract
{
    /**
     * @var EventClientContract
     */
    private $client;

    public function __construct(EventClientContract $client)
    {
        $this->client = $client;
    }

    /**
     * {@inheritDoc}
     */
    public function getEvent(int $eventId): ResponseInterface
    {
        return $this->client->request(
            'GET',
            'event/' . $eventId,
        );
    }
}
