<?php

use App\Http\Controllers\Event\StoreEventController;
use App\Http\Controllers\Event\ListEventController;
use App\Http\Controllers\Event\GetEventController;
use App\Http\Controllers\Event\DeleteEventController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('/event')->name('event')->group(function () {
    Route::get('/', ListEventController::class)
        ->name('.index');
    Route::get('/{id}', GetEventController::class)
        ->name('.get');
    Route::delete('/{id}', DeleteEventController::class)
        ->name('.delete');
    Route::post('/', StoreEventController::class)
        ->name('.store');
});