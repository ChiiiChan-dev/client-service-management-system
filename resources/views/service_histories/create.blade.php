@extends('layouts.app')

@section('title', 'Add Service History')

@section('content')

    <h2>Add Service History</h2>

        <a href="/service-history" class="btn btn-secondary">
            ← Back to Service History
        </a>

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

    <form action="/service-history" method="POST" class="data-form">
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
            
            <label for="appointment_id">Related Appointment (Optional)</label>
            <select id="appointment_id" name="appointment_id">
                <option value="">Walk-in / No appointment</option>

                @foreach ($appointments as $appointment)
                    <option value="{{ $appointment->id }}"
                        {{ old('appointment_id') == $appointment->id ? 'selected' : '' }}>
                        {{ $appointment->client->name }}
                        — {{ $appointment->appointment_date }}
                        — {{ $appointment->reason_for_visit }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="service_date">Service Date</label>
            <input
                type="date"
                id="service_date"
                name="service_date"
                value="{{ old('service_date') }}"
                required
            >
        </div>

        <div class="form-group">
            <label for="service_type">Service Type</label>
            <input
                type="text"
                id="service_type"
                name="service_type"
                value="{{ old('service_type') }}"
                placeholder="e.g. Repair, Maintenance, Installation"
                required
            >
        </div>

        <div class="form-group">
            <label for="device_appliance">Device / Appliance</label>
            <input
                type="text"
                id="device_appliance"
                name="device_appliance"
                value="{{ old('device_appliance') }}"
                placeholder="e.g. Smartphone, Electric Fan, TV"
                required
            >
        </div>

        <div class="form-group">
            <label for="diagnostics_problem">Diagnostics / Problem</label>
            <textarea
                id="diagnostics_problem"
                name="diagnostics_problem"
                rows="4"
                placeholder="Describe the reported problem and diagnosis..."
                required
            >{{ old('diagnostics_problem') }}</textarea>
        </div>

        <div class="form-group">
            <label for="service_fee">Service Fee (Optional)</label>
            <input
                type="number"
                id="service_fee"
                name="service_fee"
                step="0.01"
                min="0"
                value="{{ old('service_fee') }}"
                placeholder="Enter service fee (optional)"
            >
        </div>

        <button type="submit" class="submit-button">
            Save Service History
        </button>
    </form>

@endsection
