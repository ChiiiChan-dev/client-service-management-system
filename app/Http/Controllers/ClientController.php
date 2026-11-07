<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    if ($request->ajax()) {
        return view('clients.partials.table-rows', compact('clients'));
    }

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

    public function destroy($id)
    {
    $client = Client::findOrFail($id);

        DB::transaction(function () use ($client) {
            $client->appointments()->delete();
            $client->serviceHistories()->delete();
            $client->delete();
        });

        return redirect('/clients')->with(
            'success',
            'Client and associated records deleted successfully.'
        );
    }

}
