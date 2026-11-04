<!DOCTYPE html>
<html>
<head>
    <title>Add Service History</title>
</head>
<body>

    <h1>Add Service History</h1>

    <form action="/service-histories" method="POST">
        @csrf

        <label>Client:</label>
        <select name="client_id" required>
            <option value="">Select a Client</option>

            @foreach ($clients as $client)
                <option value="{{ $client->id }}">
                    {{ $client->name }}
                </option>
            @endforeach
        </select>
        <br><br>

        <label>Service Date:</label>
        <input type="date" name="service_date" required>
        <br><br>

        <label>Service Type:</label>
        <input type="text" name="service_type" required>
        <br><br>

        <label>Device / Appliance:</label>
        <input type="text" name="device_appliance" required>
        <br><br>

        <label>Diagnostics / Problem:</label>
        <textarea name="diagnostics_problem" required></textarea>
        <br><br>

        <label>Service Fee (Optional):</label>
        <input type="number" name="service_fee" step="0.01" min="0">
        <br><br>

        <button type="submit">Save Service History</button>
    </form>

    <br>

    <a href="/service-histories">View Service History</a>

</body>
</html>