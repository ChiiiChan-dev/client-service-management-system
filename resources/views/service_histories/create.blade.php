@extends('layouts.app')

@section('title', 'Add Service History')

@section('content')

    <h2>Add Service History</h2>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/service-history" method="POST" class="data-form">
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

        <label>Service Date:</label>
        <input
            type="date"
            name="service_date"
            value="{{ old('service_date') }}"
            required
        >

        <br><br>

        <label>Service Type:</label>
        <input
            type="text"
            name="service_type"
            value="{{ old('service_type') }}"
            required
        >

        <br><br>

        <label>Device / Appliance:</label>
        <input
            type="text"
            name="device_appliance"
            value="{{ old('device_appliance') }}"
            required
        >

        <br><br>

        <label>Diagnostics / Problem:</label>
        <textarea name="diagnostics_problem" required>{{ old('diagnostics_problem') }}</textarea>

        <br><br>

        <label>Service Fee (Optional):</label>
        <input
            type="number"
            name="service_fee"
            step="0.01"
            min="0"
            value="{{ old('service_fee') }}"
        >

        @error('service_fee')
            <p style="color: red;">{{ $message }}</p>
        @enderror

        <br><br>

        <button type="submit" class="submit-button">Save Service History</button>
    </form>

    <br>

    <a href="/service-history">Back to Service History</a>

@endsection