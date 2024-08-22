<?php

namespace App\Services\Events\Contracts;

use App\Models\Event;
use Illuminate\Support\Collection;

interface EventServiceContract
{
    /**
     * @param  array  $event
     * @return Collection
     */
    public function storeEvent(array $event): Event;

    /**
     * @return Collection
     */
    public function getEvents(): Collection;

    /**
     * @param  int  $id
     * @return Event
     */
    public function getEvent(int $id): Event;

    /**
     * @param  int  $id
     */
    public function deleteEvent(int $id): bool;
}
