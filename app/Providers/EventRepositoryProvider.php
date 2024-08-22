<?php

namespace App\Providers;

use App\Repositories\EventRepository;
use App\Repositories\Contracts\EventRepositoryContract;
use Illuminate\Support\ServiceProvider;

class EventRepositoryProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(
            EventRepositoryContract::class,
            EventRepository::class,
        );
    }
}
