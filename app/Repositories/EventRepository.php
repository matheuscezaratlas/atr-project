<?php

namespace App\Repositories;

use App\Models\Event;
use App\Repositories\Contracts\EventRepositoryContract;
use Illuminate\Support\Collection;

class EventRepository extends BaseRepository implements EventRepositoryContract
{
    /**
     * @var Event
     */
    protected $model = Event::class;

    public function all(): Collection
    {
        return $this->model::with('place')->get();
    }

    public function findById(int $id): Event
    {
        return $this->model::with('place')->where('id', $id)->firstOrFail();;
    }
}
