<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/admin-orders.css') }}">

    <title>Admin Dashboard</title>

    @vite('resources/css/app.css')
    @vite('resources/js/app.js')

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="bg-gray-100">

<div class="flex">
    <!-- Sidebar -->
    <aside class="w-64 bg-gray-800 text-white min-h-screen p-5">
        <h1 class="text-lg font-bold mb-6">Calibration Services</h1>

        <nav class="space-y-3">
            <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 bg-gray-700 rounded">Dashboard</a>
             <a href="{{ route('admin.orders.index') }}" class="block px-4 py-2 bg-gray-700 rounded">Orders</a>
        </nav>
    </aside>
    <!-- Main Content -->
    <main class="flex-1 p-8">
        @yield('content')
    </main>

</div>

</body>
</html>
