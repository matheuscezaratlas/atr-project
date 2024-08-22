<?php

namespace App\Providers;

use App\Repositories\PlaceRepository;
use App\Repositories\Contracts\PlaceRepositoryContract;
use Illuminate\Support\ServiceProvider;

class PlaceRepositoryProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(
            PlaceRepositoryContract::class,
            PlaceRepository::class,
        );
    }
}
