<?php

namespace App\Services\Places;

use App\Models\Place;
use App\Repositories\Contracts\PlaceRepositoryContract;
use App\Services\Places\Contracts\PlaceServiceContract;
use Illuminate\Support\Collection;

class PlaceService implements PlaceServiceContract
{
    /**
     * @param  PlaceRepositoryContract  $repository
     */
    public function __construct(
        protected PlaceRepositoryContract $repository
    ) {
        //
    }

    /**
     * {@inheritDoc}
     */
    public function storePlace(array $place): Collection
    {
        return $this->repository->store($event);
    }

    /**
     * {@inheritDoc}
     */
    public function getPlaces(): Collection
    {
        return $this->repository->all();
    }

    /**
     * {@inheritDoc}
     */
    public function getPlace($id): Place
    {
        return $this->repository->findBy('id', $id);
    }
}
