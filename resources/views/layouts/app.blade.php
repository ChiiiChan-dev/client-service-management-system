
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <title>@yield('title', 'Client Service Management')</title>
</head>
<body>

    
@if (url()->current() === url('/'))
    <header class="main-header">
        <div class="header-content">
            <div class="header-logo">⚙️🔧</div>

            <div class="header-divider"></div>

            <div class="header-text">
                <h1>Client Service Management System</h1>
                <p>Service and Appointment Management</p>
            </div>

            <div class="header-tagline">
                <strong>Better Service.</strong>
                <span>Happier Clients.</span>
            </div>
        </div>
    </header>
@endif

    @if (!request()->is('/'))
    <nav class="main-nav">
        <a href="/" class="{{ request()->is('/') ? 'active' : '' }}">
            Dashboard
        </a>

        <a href="/clients" class="{{ request()->is('clients*') ? 'active' : '' }}">
            Clients
        </a>

        <a href="/appointments" class="{{ request()->is('appointments*') ? 'active' : '' }}">
            Appointments
        </a>

        <a href="/service-history" class="{{ request()->is('service-history*') ? 'active' : '' }}">
            Service History
        </a>
    </nav>
@endif

    <main class="main-content">
        @yield('content')
    </main>

</body>
</html>
