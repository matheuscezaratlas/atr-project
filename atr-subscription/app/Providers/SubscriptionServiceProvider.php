<?php

namespace App\Providers;

use App\Services\Subscriptions\Contracts\SubscriptionServiceContract;
use App\Services\Subscriptions\SubscriptionService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class SubscriptionServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(SubscriptionServiceContract::class, SubscriptionService::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [SubscriptionServiceContract::class];
    }
}
