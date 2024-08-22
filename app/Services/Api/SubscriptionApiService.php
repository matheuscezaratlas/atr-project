<?php

namespace App\Services\Api;

use App\Services\Api\Contracts\SubscriptionApiServiceContract;
use App\Services\Api\Contracts\SubscriptionClientContract;
use Psr\Http\Message\ResponseInterface;
use Throwable;

class SubscriptionApiService implements SubscriptionApiServiceContract
{
    /**
     * @var SubscriptionClientContract
     */
    private $client;

    public function __construct(SubscriptionClientContract $client)
    {
        $this->client = $client;
    }

    /**
     * {@inheritDoc}
     */
    public function getSubscriptionsByEvents(array $eventIds): ResponseInterface
    {
        $eventIds = implode(',', $eventIds);

        return $this->client->request(
            'GET',
            'subscription/event/' . $eventIds,
        );
    }
}
