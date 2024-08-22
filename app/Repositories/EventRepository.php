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
        return $this->model::with('place')->with('category')->get();
    }

    public function findById(int $id): Event
    {
        return $this->model::with('place')->with('category')->where('id', $id)->firstOrFail();;
    }

    public function getEventsByCategoryId(int $categoryId): Collection
    {
        return $this->model::where('category_id', $categoryId)->get();;
    }
}
