<?php

namespace App\Providers;

use App\Services\Api\Contracts\SubscriptionClientContract;
use App\Services\Api\SubscriptionClient;
use GuzzleHttp\Client;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class SubscriptionClientProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->bind(
            SubscriptionClientContract::class,
            fn ($app) => new SubscriptionClient(
                new Client(
                    [
                        'base_uri' => 'http://localhost:8001/api/',
                        'headers' => [
                            'Accept' => 'application/json',
                            'Content-Type' => 'application/json',
                        ],
                        'timeout' => 3,
                        'debug' => true,
                    ]
                )
            )
        );
    }

    public function provides(): array
    {
        return [
            SubscriptionClientContract::class,
        ];
    }
}
