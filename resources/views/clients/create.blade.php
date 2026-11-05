@extends('layouts.app')

@section('title', 'Add New Client')

@section('content')

    <h2>Add New Client</h2>

    <a href="/clients" class="back-link">← Back to Client List</a>

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

    <form action="/clients" method="POST" class="data-form">
        @csrf

        <div class="form-group">
            <label for="name">Client Name</label>
            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name') }}"
                placeholder="Enter client's full name"
                required
            >
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <textarea
                id="address"
                name="address"
                placeholder="Enter client's complete address"
                required>{{ old('address') }}</textarea>
        </div>

        <div class="form-group">
            <label for="contact_information">Contact Information</label>
            <input
                type="text"
                id="contact_information"
                name="contact_information"
                value="{{ old('contact_information') }}"
                placeholder="Enter phone number or contact details"
                required
            >
        </div>

        <button type="submit" class="submit-button">Save Client</button>
    </form>

    <br>

    <a href="/" class="back-link">← Back to Dashboard</a>

@endsection