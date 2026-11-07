<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Models\Appointment;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use App\Models\ServiceHistory;

class ServiceHistoryController extends Controller
{
    public function create()
    {
    $clients = Client::all();

    $appointments = Appointment::with('client')
        ->whereIn('status', ['Pending', 'In Progress'])
        ->whereDoesntHave('serviceHistory')
        ->get();

    return view('service_histories.create', compact('clients', 'appointments'));
    }

    public function index()
    {
    $serviceHistories = ServiceHistory::with(['client', 'appointment'])->get();

    return view('service_histories.index', compact('serviceHistories'));
    }

    
    public function store(Request $request)
    {
    $validated = $request->validate([
        'client_id' => 'required|exists:clients,id',
        'appointment_id' => [
            'nullable',
            Rule::exists('appointments', 'id')
                ->where('client_id', $request->input('client_id')),
            Rule::unique('service_histories', 'appointment_id'),
        ],
        'service_date' => 'required|date',
        'service_type' => 'required|string|max:255',
        'device_appliance' => 'required|string|max:255',
        'diagnostics_problem' => 'required|string',
        'service_fee' => 'nullable|numeric|min:0',
    ]);

    DB::transaction(function () use ($validated) {
        $serviceHistory = ServiceHistory::create($validated);

        if ($serviceHistory->appointment) {
            $serviceHistory->appointment->update([
                'status' => 'Completed',
            ]);
        }
    });

    return redirect('/service-history')
        ->with('success', 'Service history added successfully!');
    }

}