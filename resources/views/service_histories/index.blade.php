@extends('layouts.app')

@section('title', 'Service History')

@section('content')

    <h2>Service History Records</h2>

    @if (session('success'))
        <p style="color: green;">
            {{ session('success') }}
        </p>
    @endif

    <a href="/service-history/create">Add Service History</a>

    <br><br>

    <table class="data-table">
        <thead>
            <tr>
                <th>Client</th>
                <th>Service Date</th>
                <th>Service Type</th>
                <th>Device / Appliance</th>
                <th>Diagnostics / Problem</th>
                <th>Service Fee</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($serviceHistories as $history)
                <tr>
                    <td>{{ $history->client->name }}</td>
                    <td>{{ $history->service_date }}</td>
                    <td>{{ $history->service_type }}</td>
                    <td>{{ $history->device_appliance }}</td>
                    <td>
                        <details class="diagnostic-details">
                        <summary>View description</summary>

                        <div class="diagnostic-content">
                            {{ $history->diagnostics_problem }}
                        </div>
                        </details>
                    </td>           
                       <td>
                            @if ($history->service_fee !== null)
                                <span class="service-fee">
                                    ₱{{ number_format($history->service_fee, 2) }}
                                </span>
                            @else
                                <span class="fee-unspecified">Not specified</span>
                            @endif
                        </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No service history records found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <br>

    <a href="/" class="back-link">← Back to Dashboard</a>

@endsection