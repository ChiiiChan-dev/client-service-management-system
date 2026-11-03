<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment List</title>
</head>
<body>

    <h1>Appointment List</h1>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <a href="{{ url('/appointments/create') }}">Add New Appointment</a>

    <br><br>

    @if ($appointments->isEmpty())
        <p>No appointments have been added yet.</p>
    @else
        <table border="1" cellpadding="8">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Client Name</th>
                    <th>Reason for Visit</th>
                    <th>Appointment Date</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($appointments as $appointment)
                    <tr>
                        <td>{{ $appointment->id }}</td>
                        <td>{{ $appointment->client->name }}</td>
                        <td>{{ $appointment->reason_for_visit }}</td>
                        <td>{{ $appointment->appointment_date }}</td>
                        <td>{{ $appointment->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

</body>
</html>