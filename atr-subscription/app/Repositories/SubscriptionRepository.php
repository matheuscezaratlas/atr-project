<?php

namespace App\Repositories;

use App\Models\Subscription;
use App\Repositories\Contracts\SubscriptionRepositoryContract;
use Illuminate\Support\Collection;

class SubscriptionRepository extends BaseRepository implements SubscriptionRepositoryContract
{
    /**
     * @var Subscription
     */
    protected $model = Subscription::class;

    public function all(): Collection
    {
        return $this->model::get();
    }

    public function findById(int $id): Subscription
    {
        return $this->model::where('id', $id)->firstOrFail();
    }

    public function countByEventId(int $eventId): int
    {
        return $this->model::where('event_id', $eventId)->count();
    }

    public function getByEventId(int $eventId): Collection
    {
        return $this->model::where('event_id', $eventId)->get();
    }
}
