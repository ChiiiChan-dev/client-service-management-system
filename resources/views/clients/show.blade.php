@extends('layouts.app')

@section('title', 'Client Profile')

@section('content')

    <h2>Client Profile</h2>

    <h3>Client Information</h3>

    <p><strong>Name:</strong> {{ $client->name }}</p>
    <p><strong>Address:</strong> {{ $client->address }}</p>
    <p><strong>Contact:</strong> {{ $client->contact_information }}</p>

    <hr>

    <h3>Appointments</h3>

    <table class="data-table">
        <thead>
            <tr>
                <th>Appointment Date</th>
                <th>Reason for Visit</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($client->appointments as $appointment)
                <tr>
                    <td>{{ $appointment->appointment_date }}</td>
                    <td>{{ $appointment->reason_for_visit }}</td>
                    <td>{{ $appointment->status }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">No appointment records found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <h3>Service History</h3>

        <table class="data-table">
            <thead>
                <tr>
                    <th>Service Date</th>
                    <th>Related Appointment</th>
                    <th>Service Type</th>
                    <th>Device / Appliance</th>
                    <th>Diagnostics / Problem</th>
                    <th>Service Fee</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($client->serviceHistories as $history)
                    <tr>
                        <td>{{ $history->service_date }}</td>
                        <td>
                            {{ $history->appointment
                                ? $history->appointment->appointment_date
                                : 'Walk-in' }}
                        </td>
                        <td>{{ $history->service_type }}</td>
                        <td>{{ $history->device_appliance }}</td>

                        <td>
                            <details>
                                <summary>View full description</summary>
                                <p>{{ $history->diagnostics_problem }}</p>
                            </details>
                        </td>

                        <td>
                            {{ $history->service_fee !== null
                                ? '₱' . number_format($history->service_fee, 2)
                                : 'Not specified' }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">No service history records found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>    

<a href="/clients">Back to Client List</a>

@endsection