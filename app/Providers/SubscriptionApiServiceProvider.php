<?php

namespace App\Providers;

use App\Services\Api\Contracts\SubscriptionApiServiceContract;
use App\Services\Api\SubscriptionApiService;
use Illuminate\Support\ServiceProvider;

class SubscriptionApiServiceProvider extends ServiceProvider
{
    protected $defer = true;

    /**
     * Register the application services.
     */
    public function register(): void
    {
        $this->app->bind(
            SubscriptionApiServiceContract::class,
            SubscriptionApiService::class
        );
    }

    /**
     * @return string[]
     */
    public function provides(): array
    {
        return [
            SubscriptionApiServiceContract::class,
        ];
    }
}
