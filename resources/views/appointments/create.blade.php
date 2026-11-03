<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Appointment</title>
</head>
<body>

    <h1>Add New Appointment</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ url('/appointments') }}" method="POST">
        @csrf

        <label for="client_id">Select Client:</label>
        <select id="client_id" name="client_id" required>
            <option value="">-- Select Client --</option>

            @foreach ($clients as $client)
                <option value="{{ $client->id }}"
                    {{ old('client_id') == $client->id ? 'selected' : '' }}>
                    {{ $client->name }}
                </option>
            @endforeach
        </select>

        <br><br>

        <label for="reason_for_visit">Reason for Visit:</label>
        <input type="text" id="reason_for_visit"
               name="reason_for_visit"
               value="{{ old('reason_for_visit') }}" required>

        <br><br>

        <label for="appointment_date">Appointment Date:</label>
        <input type="date" id="appointment_date"
               name="appointment_date"
               value="{{ old('appointment_date') }}" required>

        <br><br>

        <label for="status">Status:</label>
        <select id="status" name="status" required>
            <option value="Pending">Pending</option>
            <option value="In Progress">In Progress</option>
            <option value="Completed">Completed</option>
            <option value="Cancelled">Cancelled</option>
        </select>

        <br><br>

        <button type="submit">Save Appointment</button>

    </form>

</body>
</html>