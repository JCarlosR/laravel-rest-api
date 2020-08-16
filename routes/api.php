<?php

use Illuminate\Support\Facades\Route;

// Reset state before starting tests
// POST /reset
// 200 OK

Route::post('/reset', 'ResetController@reset');

Route::get('/balance', 'BalanceController@show');

// Transfer from existing account
// POST /event {"type":"transfer", "origin":"100", "amount":15, "destination":"300"}
// 201 {"origin": {"id":"100", "balance":0}, "destination": {"id":"300", "balance":15}}

// Transfer from non-existing account
// POST /event {"type":"transfer", "origin":"200", "amount":15, "destination":"300"}
// 404 0

Route::post('/event', 'EventController@store');