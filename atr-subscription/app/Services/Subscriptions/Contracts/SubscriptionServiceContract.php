<?php

namespace App\Services\Subscriptions\Contracts;

use App\Models\Subscription;
use Illuminate\Support\Collection;

interface SubscriptionServiceContract
{
    /**
     * @param  array  $subscription
     * @return Collection
     */
    public function storeSubscription(array $subscription): Subscription;

    /**
     * @return Collection
     */
    public function getSubscriptions(): Collection;

    /**
     * @param  int  $id
     * @return Subscription
     */
    public function getSubscription(int $id): Subscription;

    /**
     * @param  int  $id
     */
    public function deleteSubscription(int $id): bool;
}
