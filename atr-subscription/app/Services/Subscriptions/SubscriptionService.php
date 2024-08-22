<?php

namespace App\Services\Subscriptions;

use App\Models\Subscription;
use App\Repositories\Contracts\SubscriptionRepositoryContract;
use App\Services\Api\Contracts\EventApiServiceContract;
use App\Services\Subscriptions\Contracts\SubscriptionServiceContract;
use App\Exceptions\EventNotFoundException;
use App\Exceptions\EventSoldOutException;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;

class SubscriptionService implements SubscriptionServiceContract
{
    /**
     * @param  SubscriptionRepositoryContract  $repository
     * @param  EventApiServiceContract  $eventApiService
     */
    public function __construct(
        protected SubscriptionRepositoryContract $repository,
        protected EventApiServiceContract $eventApiService
    ) {
        //
    }

    /**
     * {@inheritDoc}
     */
    public function storeSubscription(array $subscription): Subscription
    {
        $response = $this->eventApiService->getEvent($subscription['event_id']);
        $statusCode = $response->getStatusCode();
        $reponseData = json_decode($response->getBody(), true);

        if ($statusCode != Response::HTTP_OK) {
            throw new EventNotFoundException();
        }

        $eventCapacity = $reponseData['place']['capacity'];
        $eventSubscriptions = $this->repository->countByEventId($subscription['event_id']);

        if ($eventSubscriptions + 1 > $eventCapacity) {
            throw new EventSoldOutException();
        }

        return $this->repository->store($subscription);
    }

    /**
     * {@inheritDoc}
     */
    public function getSubscriptions(): Collection
    {
        return $this->repository->all();
    }

    /**
     * {@inheritDoc}
     */
    public function getSubscriptionsByEventId(int $eventId): Collection
    {
        $response = $this->eventApiService->getEvent($eventId);
        $statusCode = $response->getStatusCode();

        if ($statusCode != Response::HTTP_OK) {
            throw new EventNotFoundException();
        }

        return $this->repository->getByEventId($eventId);
    }

    /**
     * {@inheritDoc}
     */
    public function getSubscription($id): Subscription
    {
        return $this->repository->findById($id);
    }

    /**
     * {@inheritDoc}
     */
    public function deleteSubscription($id): bool
    {
        return $this->repository->delete($id);
    }
}
