<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function create()
    {

    return view('clients.create');

    }


    public function index(Request $request)
    {
    $search = $request->input('search');

    $clients = Client::query()
        ->when($search, function ($query, $search) {
            $query->where('name', 'like', "%{$search}%")
                  ->orWhere('contact_information', 'like', "%{$search}%");
        })
        ->get();

    return view('clients.index', compact('clients', 'search'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
        'name' => 'required|string|max:255',
        'address' => 'required|string',
        'contact_information' => 'required|string|max:255',
    ]);

        $client = Client::create($validated);

        return redirect('/clients')
            ->with('success', 'Client added successfully!');
    }

    public function show($id)
    {
        $client = Client::with([
            'appointments',
            'serviceHistories'
        ])->findOrFail($id);

        return view('clients.show', compact('client'));
    }
}
