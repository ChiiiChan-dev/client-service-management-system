@extends('layouts.app')

@section('title', 'Clients')

@section('content')

    <h2>Client List</h2>

    @if (session('success'))
        <p style="color: green;">
            {{ session('success') }}
        </p>
    @endif

    <form action="/clients" method="GET">
    <input
        type="text"
        name="search"
        value="{{ $search }}"
    >   
    

    <a href="/clients">Clear</a>
    </form>

    <br>

    <a href="/clients/create">Add New Client</a>

    <br><br>

    <table class="data-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Contact Information</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($clients as $client)
                <tr>
                    <td>{{ $client->id }}</td>
                    <td>
                        <a href="/clients/{{ $client->id }}">
                            {{ $client->name }}
                        </a>
                    </td>                    
                    <td>{{ $client->address }}</td>
                    <td>{{ $client->contact_information }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No clients found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

@endsection