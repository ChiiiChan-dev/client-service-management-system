<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ServiceHistoryController extends Controller
{
    public function create()
    {
        $clients = Client::all();

        return view('service_histories.create', compact('clients'));
    }

    public function index()
    {
    $serviceHistories = \App\Models\ServiceHistory::with('client')->get();

    return view('service_histories.index', compact('serviceHistories'));
    }

    public function store(Request $request)
    {
    $validated = $request->validate([
        'client_id' => 'required|exists:clients,id',
        'service_date' => 'required|date',
        'service_type' => 'required|string|max:255',
        'device_appliance' => 'required|string|max:255',
        'diagnostics_problem' => 'required|string',
        'service_fee' => 'nullable|numeric|min:0',
    ]);

    \App\Models\ServiceHistory::create($validated);

    return redirect('/service-histories')
        ->with('success', 'Service history added successfully!');
    }
}