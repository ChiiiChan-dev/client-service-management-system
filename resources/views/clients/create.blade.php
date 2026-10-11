
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Client</title>
</head>
<body>
    <h1>Add New Client</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ url('/clients') }}" method="POST">
        @csrf

        <label for="name">Client Name:</label>
        <input type="text" id="name" name="name"
               value="{{ old('name') }}" required>
        <br><br>

        <label for="address">Address:</label>
        <textarea id="address" name="address"
                  required>{{ old('address') }}</textarea>
        <br><br>

        <label for="contact_information">Contact Information:</label>
        <input type="text" id="contact_information"
               name="contact_information"
               value="{{ old('contact_information') }}" required>
        <br><br>

        <button type="submit">Save Client</button>
    </form>
</body>
</html>
