<?php

namespace App\Providers;

use App\Repositories\SubscriptionRepository;
use App\Repositories\Contracts\SubscriptionRepositoryContract;
use Illuminate\Support\ServiceProvider;

class SubscriptionRepositoryProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(
            SubscriptionRepositoryContract::class,
            SubscriptionRepository::class,
        );
    }
}
