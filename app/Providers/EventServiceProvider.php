<?php

namespace App\Providers;

use App\Services\Events\Contracts\EventServiceContract;
use App\Services\Events\EventService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(EventServiceContract::class, EventService::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [EventServiceContract::class];
    }
}
