<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/token', function (Request $request) {
    $token = $request->session()->token();
    dd($token);
});