@extends('layouts.app')

@section('title', 'Add Appointment')

@section('content')

    <h2>Add New Appointment</h2>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/appointments" method="POST" class="data-form">
        @csrf

        <label>Client:</label>
        <select name="client_id" required>
            <option value="">Select a Client</option>

            @foreach ($clients as $client)
                <option value="{{ $client->id }}"
                    {{ old('client_id') == $client->id ? 'selected' : '' }}>
                    {{ $client->name }}
                </option>
            @endforeach
        </select>

        <br><br>

        <label>Reason for Visit:</label>
        <input
            type="text"
            name="reason_for_visit"
            value="{{ old('reason_for_visit') }}"
            required
        >

        <br><br>

        <label>Appointment Date:</label>
        <input
            type="date"
            name="appointment_date"
            value="{{ old('appointment_date') }}"
            required
        >

        <br><br>

        <label>Status:</label>
        <select name="status" required>
            @foreach (['Pending', 'In Progress', 'Completed', 'Cancelled'] as $status)
                <option value="{{ $status }}"
                    {{ old('status', 'Pending') == $status ? 'selected' : '' }}>
                    {{ $status }}
                </option>
            @endforeach
        </select>

        <br><br>

        <button type="submit" class="submit-button">Save Appointment</button>
    </form>

    <br>

    <a href="/appointments">Back to Appointment List</a>

@endsection