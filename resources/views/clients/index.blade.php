@extends('layouts.app')

@section('title', 'Clients')

@section('content')
   
    <h2>Client List</h2>

    @if (session('success'))
        <p id="success-message" style="color: green;">
            {{ session('success') }}
        </p>
    @endif

    <form action="/clients" method="GET" class="search-form" id="client-search-form">
        <input
            type="text"
            name="search"
            id="client-search-input"
            value="{{ $search }}"
            placeholder="Search by client name or contact information..."
            autocomplete="off"
        >
    </form>

    <a href="/clients/create" class="btn btn-primary">
        + Add New Client
    </a>

    <br>

    <table class="data-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Contact Information</th>
                <th>Actions</th>
            </tr>
        </thead>

            <tbody id="client-table-body">
                @include('clients.partials.table-rows', ['clients' => $clients])
            </tbody>
        
    </table>

    <script>
        const searchInput = document.getElementById('client-search-input');
        const tableBody = document.getElementById('client-table-body');

        let searchTimer;

        searchInput.addEventListener('input', function () {
            clearTimeout(searchTimer);

            searchTimer = setTimeout(async function () {
                const search = searchInput.value;

                try {
                    const response = await fetch(
                        `/clients?search=${encodeURIComponent(search)}`,
                        {
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest'
                            }
                        }
                    );

                    if (!response.ok) {
                        throw new Error('Search request failed.');
                    }

                    tableBody.innerHTML = await response.text();

                } catch (error) {
                    console.error(error);
                }
            }, 100); // Delay of 100 milliseconds   
        });
    </script>

    <script>
        const successMessage = document.getElementById('success-message');

        if (successMessage) {
            setTimeout(function () {
                successMessage.style.transition = 'opacity 0.5s ease';
                successMessage.style.opacity = '0';

                setTimeout(function () {
                    successMessage.remove();
                }, 500);

            }, 3000);
        }
    </script>

@endsection

