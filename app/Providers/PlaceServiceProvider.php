<?php

namespace App\Providers;

use App\Services\Places\Contracts\PlaceServiceContract;
use App\Services\Places\PlaceService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class PlaceServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(PlaceServiceContract::class, PlaceService::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [PlaceServiceContract::class];
    }
}
