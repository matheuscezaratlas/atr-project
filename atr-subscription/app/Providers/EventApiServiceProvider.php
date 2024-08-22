<?php

namespace App\Providers;

use App\Services\Api\Contracts\EventApiServiceContract;
use App\Services\Api\EventApiService;
use Illuminate\Support\ServiceProvider;

class EventApiServiceProvider extends ServiceProvider
{
    protected $defer = true;

    /**
     * Register the application services.
     */
    public function register(): void
    {
        $this->app->bind(
            EventApiServiceContract::class,
            EventApiService::class
        );
    }

    /**
     * @return string[]
     */
    public function provides(): array
    {
        return [
            EventApiServiceContract::class,
        ];
    }
}
