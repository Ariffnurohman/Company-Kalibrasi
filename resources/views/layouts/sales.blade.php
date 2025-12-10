<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Sales Dashboard')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <!-- TOPBAR -->
    <div class="fixed top-0 left-0 right-0 bg-blue-600 text-white h-14 flex items-center justify-between px-6 shadow z-50">
        <h1 class="text-lg font-semibold">Sales Dashboard</h1>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="px-3 py-1 bg-red-500 hover:bg-red-600 rounded text-sm">Logout</button>
        </form>
    </div>

    <!-- SIDEBAR -->
    <div class="fixed top-14 left-0 w-60 h-[calc(100vh-3.5rem)] bg-blue-700 text-white shadow-lg">
        <nav class="mt-6">
            <a href="{{ route('sales.dashboard') }}" class="flex items-center gap-3 px-5 py-3 hover:bg-blue-600 {{ request()->routeIs('sales.dashboard') ? 'bg-blue-500' : '' }}">
                <i class="bi bi-speedometer2"></i>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('sales.pickup.create') }}" class="flex items-center gap-3 px-5 py-3 hover:bg-blue-600 {{ request()->routeIs('sales.pickup.create') ? 'bg-blue-500' : '' }}">
                <i class="bi bi-plus-circle"></i>
                <span>Buat Pengambilan Alat</span>
            </a>

            <a href="{{ route('sales.pickup.history') }}" class="flex items-center gap-3 px-5 py-3 hover:bg-blue-600 {{ request()->routeIs('sales.pickup.history') ? 'bg-blue-500' : '' }}">
                <i class="bi bi-clock-history"></i>
                <span>History Pickup</span>
            </a>
        </nav>
    </div>

    <!-- CONTENT -->
    <div class="ml-60 pt-20 p-6 min-h-screen">
        @yield('content')
    </div>

</body>
</html>
