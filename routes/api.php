<?php

use Illuminate\Support\Facades\Route;

// Reset state before starting tests
// POST /reset
// 200 OK

Route::post('/reset', 'ResetController@reset');

Route::get('/balance', 'BalanceController@show');

Route::post('/event', 'EventController@store');