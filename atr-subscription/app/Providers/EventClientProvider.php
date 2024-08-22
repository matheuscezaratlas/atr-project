<?php

namespace App\Providers;

use App\Services\Api\Contracts\EventClientContract;
use App\Services\Api\EventClient;
use GuzzleHttp\Client;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class EventClientProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->bind(
            EventClientContract::class,
            fn ($app) => new EventClient(
                new Client(
                    [
                        'base_uri' => 'http://localhost:8000/api/',
                        'headers' => [
                            'Accept' => 'application/json',
                            'Content-Type' => 'application/json',
                        ],
                    ]
                )
            )
        );
    }

    public function provides(): array
    {
        return [
            EventClientContract::class,
        ];
    }
}
