<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin Panel</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Global Mate-UI CSS -->
    <link rel="stylesheet" href="{{ asset('css/mate-admin.css') }}">

</head>

<body class="bg-light">

    <div class="d-flex">

        <!-- SIDEBAR -->
        <aside class="mate-sidebar shadow-sm">
            <div class="sidebar-header">
                <h4 class="fw-bold mb-0">Admin</h4>
                <span class="text-muted small">Control Panel</span>
            </div>

            <ul class="sidebar-menu">
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="menu-item {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                        <i class="bi bi-speedometer2"></i> Dashboard
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.orders.index') }}" class="menu-item {{ request()->is('admin/orders*') ? 'active' : '' }}">
                        <i class="bi bi-receipt-cutoff"></i> Orders
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.pickups.index') }}" class="menu-item {{ request()->is('admin/pickups*') ? 'active' : '' }}">
                        <i class="bi bi-receipt-cutoff"></i> Pegambilan Alat
                    </a>
                </li>


                <li>
                    <a href="#" class="menu-item">
                        <i class="bi bi-gear"></i> Settings
                    </a>
                </li>
            </ul>
        </aside>

        <!-- MAIN CONTENT -->
        <main class="mate-main flex-grow-1">
            <!-- TOP NAV -->
            <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm mate-topnav">
                <div class="container-fluid">

                    <span class="fw-semibold fs-5">Admin Panel</span>

                    <!-- RIGHT SIDE GROUP -->
                    <div class="d-flex align-items-center ms-auto gap-2">

                        <!-- NOTIFICATION BUTTON -->
                        <div class="dropdown">
                            <button class="btn btn-light border position-relative" data-bs-toggle="dropdown">
                                <i class="bi bi-bell"></i>
                                @if($notifications->count() > 0)
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    {{ $notifications->count() }}
                                </span>
                                @endif
                            </button>

                            <ul class="dropdown-menu dropdown-menu-end">
                                @forelse($notifications as $notification)
                                <li>
                                    <a class="dropdown-item" href="{{ route('admin.pickups.index') }}">
                                        {{ $notification->data['message'] }}
                                    </a>
                                </li>
                                @empty
                                <li><span class="dropdown-item">Tidak ada notifikasi baru</span></li>
                                @endforelse
                            </ul>
                        </div>

                        <!-- ADMIN DROPDOWN -->
                        <div class="dropdown">
                            <button class="btn btn-light border dropdown-toggle" data-bs-toggle="dropdown">
                                <i class="bi bi-person-circle me-1"></i> Admin
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <form action="#" method="POST">
                                        <button class="dropdown-item text-danger">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </div>

                    </div>

                </div>
            </nav>

            <!-- PAGE CONTENT -->
            <div class="p-4">
                @yield('content')
            </div>

        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>