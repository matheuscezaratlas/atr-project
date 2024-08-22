<?php

use App\Http\Controllers\Subscription\StoreSubscriptionController;
use App\Http\Controllers\Subscription\ListSubscriptionController;
use App\Http\Controllers\Subscription\ListSubscriptionsByEventController;
use App\Http\Controllers\Subscription\GetSubscriptionController;
use App\Http\Controllers\Subscription\DeleteSubscriptionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('/subscription')->name('subscription')->group(function () {
    Route::get('/', ListSubscriptionController::class)
        ->name('.index');
    Route::get('/{id}', GetSubscriptionController::class)
        ->name('.get');
    Route::get('/event/{event_id}', ListSubscriptionsByEventController::class)
        ->name('.get');
    Route::delete('/{id}', DeleteSubscriptionController::class)
        ->name('.delete');
    Route::post('/', StoreSubscriptionController::class)
        ->name('.store');
});