<?php

namespace App\Services\Events;

use App\Models\Event;
use App\Repositories\Contracts\EventRepositoryContract;
use App\Services\Events\Contracts\EventServiceContract;
use App\Services\Contracts\EmailServiceContract;
use Illuminate\Support\Collection;

class EventService implements EventServiceContract
{
    /**
     * @param  EventRepositoryContract  $repository
     * @param  EmailServiceContract  $emailService
     */
    public function __construct(
        protected EventRepositoryContract $repository,
        protected EmailServiceContract $emailService
    ) {
        //
    }

    /**
     * {@inheritDoc}
     */
    public function storeEvent(array $event): Event
    {
        $event = $this->repository->store($event);
        $this->emailService->dispatchNewEventEmail($event->category_id);
        return $event;
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
