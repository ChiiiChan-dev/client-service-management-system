@extends('layouts.app')

@section('title', 'Add New Client')

@section('content')

    <h2>Add New Client</h2>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/clients" method="POST" class="data-form">
        @csrf

        <label>Name:</label>
        <input
            type="text"
            name="name"
            value="{{ old('name') }}"
            required
        >
        <br><br>

        <label>Address:</label>
        <textarea name="address" required>{{ old('address') }}</textarea>
        <br><br>

        <label>Contact Information:</label>
        <input
            type="text"
            name="contact_information"
            value="{{ old('contact_information') }}"
            required
        >
        <br><br>

        <button type="submit" class="submit-button">Save Client</button>
    </form>

    <br>

    <a href="/clients">Back to Client List</a>

@endsection