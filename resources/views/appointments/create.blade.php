@extends('layouts.app')

@section('title', 'Add Appointment')

@section('content')

    <h2>Add New Appointment</h2>

    <a href="/appointments" class="back-link">← Back to Appointment List</a>

    @if ($errors->any())
        <div class="form-errors">
            <strong>Please check the following errors:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/appointments" method="POST" class="data-form">
        @csrf

        <div class="form-group">
            <label for="client_id">Client</label>
            <select id="client_id" name="client_id" required>
                <option value="">Select a Client</option>

                @foreach ($clients as $client)
                    <option value="{{ $client->id }}"
                        {{ old('client_id') == $client->id ? 'selected' : '' }}>
                        {{ $client->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="reason_for_visit">Reason for Visit</label>
            <input
                type="text"
                id="reason_for_visit"
                name="reason_for_visit"
                value="{{ old('reason_for_visit') }}"
                placeholder="Enter the reason for the appointment"
                required
            >
        </div>

        <div class="form-group">
            <label for="appointment_date">Appointment Date</label>
            <input
                type="date"
                id="appointment_date"
                name="appointment_date"
                value="{{ old('appointment_date') }}"
                required
            >
        </div>

        <div class="form-group">
            <label for="status">Appointment Status</label>
            <select id="status" name="status" required>
                @foreach (['Pending', 'In Progress', 'Completed', 'Cancelled'] as $status)
                    <option value="{{ $status }}"
                        {{ old('status', 'Pending') == $status ? 'selected' : '' }}>
                        {{ $status }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="submit-button">Save Appointment</button>
    </form>

    <br>

    <a href="/" class="back-link">← Back to Dashboard</a>

@endsection
