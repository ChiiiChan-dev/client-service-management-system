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


    public function index()
    {
        $clients = Client::all();

        return view('clients.index', compact('clients'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
        'name' => 'required|string|max:255',
        'address' => 'required|string',
        'contact_information' => 'required|string|max:255',
    ]);

        $client = Client::create($validated);

        return response()->json($client, 201);
    }
}
