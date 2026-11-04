<!DOCTYPE html>
<html>
<head>
    <title>Service History</title>
</head>
<body>

    <h1>Service History Records</h1>

    @if (session('success'))
        <p style="color: green;">
            {{ session('success') }}
        </p>
    @endif

    <a href="/service-histories/create">Add Service History</a>

    <br><br>

    <table border="1" cellpadding="10">
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
                    <td>{{ $history->diagnostics_problem }}</td>
                    <td>
                        {{ $history->service_fee !== null
                            ? number_format($history->service_fee, 2)
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

</body>
</html>