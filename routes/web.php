<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ServiceHistoryController;

Route::get('/', function () {
    return view('dashboard', [
        'totalClients' => \App\Models\Client::count(),
        'totalAppointments' => \App\Models\Appointment::count(),
        'pendingAppointments' => \App\Models\Appointment::where('status', 'Pending')->count(),
        'totalServiceHistories' => \App\Models\ServiceHistory::count(),
        'recentServiceHistories' => \App\Models\ServiceHistory::with('client')
        ->latest('service_date')
        ->take(5)
        ->get(),

        'upcomingAppointments' => \App\Models\Appointment::with('client')
            ->whereDate('appointment_date', '>=', now()->toDateString())
            ->whereIn('status', ['Pending', 'In Progress'])
            ->orderBy('appointment_date', 'asc')
            ->take(5)
            ->get(),
    ]);
});

// Client Routes
Route::get('/clients/create', [ClientController::class, 'create']);
Route::get('/clients/{id}', [ClientController::class, 'show']);
Route::get('/clients', [ClientController::class, 'index']);
Route::post('/clients', [ClientController::class, 'store']);
Route::delete('/clients/{id}', [ClientController::class, 'destroy']);

// Appointment Routes
Route::get('/appointments/create', [AppointmentController::class, 'create']);
Route::get('/appointments', [AppointmentController::class, 'index']);
Route::post('/appointments', [AppointmentController::class, 'store']);

// Service History Routes
Route::get('/service-history/create', [ServiceHistoryController::class, 'create']);
Route::get('/service-history', [ServiceHistoryController::class, 'index']);
Route::post('/service-history', [ServiceHistoryController::class, 'store']);

// Browse Records Route
Route::get('/records', function () {
    return view('records.index');
});
