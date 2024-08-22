<?php

namespace App\Services;

use App\Models\Event;
use App\Repositories\Contracts\EventRepositoryContract;
use App\Services\Api\Contracts\SubscriptionApiServiceContract;
use App\Services\Contracts\EmailServiceContract;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

class EmailService implements EmailServiceContract
{
    /**
     * @param  EventRepositoryContract  $repository
     * @param  SubscriptionApiServiceContract  $subscriptionApiService
     */
    public function __construct(
        protected EventRepositoryContract $repository,
        protected SubscriptionApiServiceContract  $subscriptionApiService
    ) {
        //
    }

    /**
     * {@inheritDoc}
     */
    public function dispatchNewEventEmail(int $categoryId): void
    {
        $eventList = Arr::pluck($this->repository->getEventsByCategoryId($categoryId)->toArray(), 'id');
        $subscriptionList = $this->subscriptionApiService->getSubscriptionsByEvents($eventList);
        dd($subscriptionList->getStatusCode());
        dd('dispara email');
    }
}
