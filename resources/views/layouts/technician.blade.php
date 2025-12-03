<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Technician Panel - {{ isset($title) ? $title : 'Dashboard' }}</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f4f6f9;
            font-family: 'Inter', sans-serif;
        }

        .sidebar {
            width: 250px;
            min-height: 100vh;
            background-color: white;
            border-right: 1px solid #ddd;
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 20px;
        }

        .sidebar a {
            color: #333;
            font-weight: 500;
            padding: 12px 20px;
            display: block;
            text-decoration: none;
            border-radius: 6px;
            margin: 4px 0;
        }

        .sidebar a:hover, .sidebar a.active {
            background-color: #0d6efd;
            color: white;
        }

        .content-area {
            margin-left: 260px;
            padding: 25px;
        }

        .topbar {
            background: white;
            border-bottom: 1px solid #ddd;
            padding: 15px 25px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

    {{-- SIDEBAR --}}
    <div class="sidebar shadow-sm">
        <h5 class="text-center fw-bold mb-4">Technician Panel</h5>

        <a href="{{ route('technician.dashboard') }}" 
           class="{{ request()->routeIs('technician.dashboard') ? 'active' : '' }}">
            📊 Dashboard
        </a>

        <a href="{{ route('technician.orders.index') }}" 
           class="{{ request()->routeIs('technician.orders.*') ? 'active' : '' }}">
            📦 Orders
        </a>

        <a href="{{ route('logout') }}" 
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            🚪 Logout
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
            @csrf
        </form>
    </div>

    {{-- CONTENT --}}
    <div class="content-area">

        {{-- TOP BAR --}}
        <div class="topbar d-flex justify-content-between align-items-center">
            <h4 class="fw-bold m-0">{{ $title ?? 'Technician Area' }}</h4>
            <span class="text-muted">Logged in as: {{ Auth::user()->name }}</span>
        </div>

        {{-- ALERT GLOBAL --}}
        @if(session('success'))
            <div class="alert alert-success shadow-sm">
                <strong>Success:</strong> {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger shadow-sm">
                <strong>Error:</strong> {{ session('error') }}
            </div>
        @endif

        {{-- PAGE CONTENT --}}
        <div>
            @yield('content')
        </div>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
