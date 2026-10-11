<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/clients/create', [ClientController::class, 'create']);

Route::get('/clients', [ClientController::class, 'index']);

Route::post('/clients', [ClientController::class, 'store']);