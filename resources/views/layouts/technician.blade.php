<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Technician Panel</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: #f5f7fb;
        }

        /* Sidebar */
        .sidebar {
            width: 260px;
            background: #ffffff;
            height: 100vh;
            position: fixed;
            border-right: 1px solid #e5e7eb;
            top: 0;
            left: 0;
            padding: 20px 0;
            transition: 0.3s;
        }

        .sidebar .brand {
            font-size: 20px;
            font-weight: bold;
            text-align: center;
            padding-bottom: 20px;
            color: #111827;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 20px;
            color: #374151;
            text-decoration: none;
            font-size: 15px;
            font-weight: 500;
            transition: 0.2s;
        }

        .sidebar a:hover {
            background: #f3f4f6;
        }

        .sidebar a.active {
            background: #e5e7eb;
            color: #111827;
            font-weight: 600;
        }

        /* TOPBAR */
        .topbar {
            margin-left: 260px;
            height: 60px;
            background: #fff;
            border-bottom: 1px solid #e5e7eb;
            padding: 0 25px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .content {
            margin-left: 260px;
            padding: 30px;
        }
    </style>
</head>
<body>

    <!-- SIDEBAR -->
    <div class="sidebar">
        <div class="brand">
            <i class="bi bi-tools"></i> Technician
        </div>

        <a href="{{ route('technician.dashboard') }}" 
            class="{{ Request::is('technician/dashboard') ? 'active' : '' }}">
            <i class="bi bi-speedometer2"></i> Dashboard
        </a>

        <a href="{{ route('technician.orders.index') }}" 
            class="{{ Request::is('technician/orders*') ? 'active' : '' }}">
            <i class="bi bi-clipboard-check"></i> Orders
        </a>


        <a href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="bi bi-box-arrow-right"></i> Logout
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>

    <!-- TOPBAR -->
    <div class="topbar">
        <h6 class="fw-semibold mb-0">Technician Dashboard</h6>

        <div class="d-flex align-items-center gap-2">
            <i class="bi bi-person-circle fs-5"></i>
            <span class="fw-semibold">
                {{ Auth::user()->name }}
            </span>
        </div>
    </div>

    <!-- CONTENT -->
    <div class="content">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
