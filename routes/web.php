<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ServiceHistoryController;

Route::get('/', function () {
    return view('welcome');
});

// Client Routes
Route::get('/clients/create', [ClientController::class, 'create']);
Route::get('/clients', [ClientController::class, 'index']);
Route::post('/clients', [ClientController::class, 'store']);

// Appointment Routes
Route::get('/appointments/create', [AppointmentController::class, 'create']);
Route::get('/appointments', [AppointmentController::class, 'index']);
Route::post('/appointments', [AppointmentController::class, 'store']);

// Service History Routes
Route::get('/service-histories/create', [ServiceHistoryController::class, 'create']);
Route::get('/service-histories', [ServiceHistoryController::class, 'index']);
Route::post('/service-histories', [ServiceHistoryController::class, 'store']);

