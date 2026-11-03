<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Client;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function create()
    {
        $clients = Client::all();

        return view('appointments.create', compact('clients'));
    }

    public function index()
    {
        $appointments = Appointment::with('client')->get();

        return view('appointments.index', compact('appointments'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'reason_for_visit' => 'required|string|max:255',
            'appointment_date' => 'required|date',
            'status' => 'required|in:Pending,In Progress,Completed,Cancelled',
        ]);

        Appointment::create($validated);

        return redirect('/appointments')
            ->with('success', 'Appointment added successfully!');
    }
}