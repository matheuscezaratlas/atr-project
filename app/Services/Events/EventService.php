<?php

namespace App\Services\Events;

use App\Models\Event;
use App\Repositories\Contracts\EventRepositoryContract;
use App\Services\Events\Contracts\EventServiceContract;
use Illuminate\Support\Collection;

class EventService implements EventServiceContract
{
    /**
     * @param  EventRepositoryContract  $repository
     */
    public function __construct(
        protected EventRepositoryContract $repository
    ) {
        //
    }

    /**
     * {@inheritDoc}
     */
    public function storeEvent(array $event): Event
    {
        return $this->repository->store($event);
    }

    /**
     * {@inheritDoc}
     */
    public function getEvents(): Collection
    {
        return $this->repository->all();
    }

    /**
     * {@inheritDoc}
     */
    public function getEvent($id): Event
    {
        return $this->repository->findById($id);
    }

    /**
     * {@inheritDoc}
     */
    public function deleteEvent($id): bool
    {
        return $this->repository->delete($id);
    }
}
