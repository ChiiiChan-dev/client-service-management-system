@extends('layouts.app')

@section('title', 'Appointments')

@section('content')

    <h2>Appointment List</h2>

    @if (session('success'))
        <p style="color: green;">
            {{ session('success') }}
        </p>
    @endif

    <a href="/appointments/create">Add New Appointment</a>

    <br><br>

    <table class="data-table">
        <thead>
            <tr>
                <th>Client</th>
                <th>Reason for Visit</th>
                <th>Appointment Date</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($appointments as $appointment)
                <tr>
                    <td>{{ $appointment->client->name }}</td>
                    <td>{{ $appointment->reason_for_visit }}</td>
                    <td>{{ $appointment->appointment_date }}</td>
                    <td>
                    @if ($appointment->status === 'Pending')
                        <span class="status-badge status-pending">Pending</span>
                    @elseif ($appointment->status === 'In Progress')
                        <span class="status-badge status-progress">In Progress</span>
                    @elseif ($appointment->status === 'Completed')
                        <span class="status-badge status-completed">Completed</span>
                    @elseif ($appointment->status === 'Cancelled')
                        <span class="status-badge status-cancelled">Cancelled</span>
                    @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No appointments found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    
    <br>
    
    <a href="/" class="back-link">← Back to Dashboard</a>

@endsection