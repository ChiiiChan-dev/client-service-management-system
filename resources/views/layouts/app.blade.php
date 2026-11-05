<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Client Service Management')</title>
</head>
<body>

    <header>
        <h1>Client Service Management System</h1>

        <nav>
            <a href="/">Home</a> |
            <a href="/clients">Clients</a> |
            <a href="/appointments">Appointments</a> |
            <a href="/service-history">Service History</a>
        </nav>
    </header>

    <hr>

    <main>
        @yield('content')
    </main>

</body>
</html>