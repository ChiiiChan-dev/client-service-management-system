@extends('layouts.app')

@section('title', 'Clients')

@section('content')
   
    <h2>Client List</h2>

    @if (session('success'))
        <p style="color: green;">
            {{ session('success') }}
        </p>
    @endif

    <form action="/clients" method="GET" class="search-form">
        <input
            type="text"
            name="search"
            value="{{ $search }}"
            placeholder="Search by client name or contact information..."
        >

        <button type="submit">Search</button>
        <a href="/clients" class="clear-search">Clear</a>
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
                <th>Actions</th>
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
                    <td>
                        <form action="/clients/{{ $client->id }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to permanently delete this client and all associated records?');">
                            @csrf
                            @method('DELETE')

                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No clients found.</td>
                </tr>
            @endforelse
            </tbody>
    </table>

    <br>

    <a href="/" class="back-link">← Back to Dashboard</a>

@endsection

