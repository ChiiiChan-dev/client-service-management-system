@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

    <h2><b>DASHBOARD</b></h2>

    <section class="dashboard-section">

        <h3>Client Service Overview</h3>

        <div class="dashboard-stats">
            
            <div class="stat-card">
                <h3>Total Clients</h3>
                <p>{{ $totalClients }}</p>
            </div>

            <div class="stat-card">
                <h3>Total Appointments</h3>
                <p>{{ $totalAppointments }}</p>
            </div>

            <div class="stat-card">
                <h3>Pending Appointments</h3>
                <p>{{ $pendingAppointments }}</p>
            </div>

            <div class="stat-card">
                <h3>Service History Records</h3>
                <p>{{ $totalServiceHistories }}</p>
            </div>

        </div>
        
    </section>



    <section class="dashboard-section">

        <h3>Quick Actions</h3>

        <div class="quick-actions">
            <a href="/clients/create" class="action-card">
                <span class="action-icon">👤</span>
                <h3>Add New Client</h3>
                <p>Register a new customer.</p>
                <span class="action-link">Get started →</span>
            </a>

            <a href="/appointments/create" class="action-card">
                <span class="action-icon">📅</span>
                <h3>Schedule Appointment</h3>
                <p>Arrange a customer appointment.</p>
                <span class="action-link">Get started →</span>
            </a>

            <a href="/service-history/create" class="action-card">
                <span class="action-icon">🔧</span>
                <h3>Record New Service</h3>
                <p>Save repair and service details.</p>
                <span class="action-link">Get started →</span>
            </a>

            <a href="/records" class="action-card">
                <span class="action-icon">📂</span>
                <h3>Browse Records</h3>
                <p>Access all saved records in one place.</p>
                <span class="action-link">View Records →</span>
            </a>

        </div>

    </section>

    <section class="dashboard-section">

        <h3>Upcoming Appointments</h3>
        
        <div class="table-wrapper">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Client</th>
                        <th>Appointment Date</th>
                        <th>Reason for Visit</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($upcomingAppointments as $appointment)
                        <tr>
                        <td>
                                <a href="/clients/{{ $appointment->client->id }}">
                                    {{ $appointment->client->name }}
                                </a>
                            </td>
                            <td>{{ $appointment->appointment_date }}</td>
                            <td>{{ $appointment->reason_for_visit }}</td>
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
                            <td colspan="4">No upcoming appointments found.</td>
                        </tr>
                    @endforelse
                </tbody>
        
            </table>
        </div>

    </section>

    <section class="dashboard-section">

        <h3>Recent Service Records</h3>

        <div class="table-wrapper">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Client</th>
                        <th>Service Date</th>
                        <th>Service Type</th>
                        <th>Device / Appliance</th>
                        <th>Service Fee</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($recentServiceHistories as $history)
                        <tr>
                            <td>
                                <a href="/clients/{{ $history->client->id }}">
                                    {{ $history->client->name }}
                                </a>
                            </td>
                            <td>{{ $history->service_date }}</td>
                            <td>{{ $history->service_type }}</td>
                            <td>{{ $history->device_appliance }}</td>
                            <td>
                                {{ $history->service_fee !== null
                                    ? '₱' . number_format($history->service_fee, 2)
                                    : 'Not specified' }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">No service records found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </section>

    <!-- Dashboard Footer -->
    <footer class="dashboard-footer">
        <div class="footer-help">
            <span class="footer-info-icon">ⓘ</span>
            <p>
                Need help? Contact your system administrator for assistance.
            </p>
        </div>

        <div class="footer-version">
            Client Service Management System v1.0
        </div>
    </footer>

@endsection