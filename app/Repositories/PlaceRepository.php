<?php

namespace App\Repositories;

use App\Models\Place;
use App\Repositories\Contracts\PlaceRepositoryContract;

class PlaceRepository extends BaseRepository implements PlaceRepositoryContract
{
    /**
     * @var Place
     */
    protected $model = Place::class;
}
