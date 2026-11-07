@extends('layouts.app')

@section('title', 'Browse Records')

@section('content')

    <h2>Browse Records</h2>
    <p>Select a category to view and manage existing records.</p>

    <div class="record-categories">

        <a href="/clients" class="record-card">
            <span class="record-icon">👥</span>
            <h3>Client Records</h3>
            <p>View and search registered customers.</p>
            <span class="record-link">Browse Clients →</span>
        </a>

        <a href="/appointments" class="record-card">
            <span class="record-icon">📅</span>
            <h3>Appointment Records</h3>
            <p>Review and manage scheduled appointments.</p>
            <span class="record-link">Browse Appointments →</span>
        </a>

        <a href="/service-history" class="record-card">
            <span class="record-icon">🔧</span>
            <h3>Service History</h3>
            <p>Review previous repairs and service records.</p>
            <span class="record-link">Browse Service History →</span>
        </a>

    </div>

@endsection