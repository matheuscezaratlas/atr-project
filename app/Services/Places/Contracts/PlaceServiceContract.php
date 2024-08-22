<?php

namespace App\Services\Places\Contracts;

use Illuminate\Support\Collection;

interface PlaceServiceContract
{
    /**
     * @param  array  $place
     * @return Collection
     */
    public function storePlace(array $items): Collection;

    /**
     * @return Collection
     */
    public function getPlaces(): Collection;
}
