<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Sales Dashboard')</title>
    <link rel="icon" type="image/png" href="{{ asset('images/rukun-logo_5.png') }}">

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
</head>

<body class="bg-gray-100" x-data="{ sidebarOpen: false }">

    <!-- TOP NAV -->
    <nav class="fixed top-0 left-0 right-0 bg-blue-600 text-white h-14 
                flex items-center justify-between px-6 shadow z-50">

        <!-- Hamburger (Mobile) -->
        <button class="text-3xl md:hidden" @click="sidebarOpen = true">
            <i class="bi bi-list"></i>
        </button>

        <h1 class="text-lg font-semibold">Sales Dashboard</h1>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="px-3 py-1 bg-red-500 hover:bg-red-600 rounded text-sm">
                Logout
            </button>
        </form>
    </nav>

    <div class="flex min-h-screen pt-14">

        <!-- BACKDROP MOBILE -->
        <div class="fixed inset-0 bg-black/40 z-40 md:hidden"
             x-show="sidebarOpen"
             x-transition.opacity
             @click="sidebarOpen = false">
        </div>

        <!-- SIDEBAR (Mobile + Desktop, sama seperti Admin) -->
        <aside
            class="fixed md:static top-0 left-0 h-full w-64 bg-blue-700 text-white shadow-lg z-50
                   transform -translate-x-full md:translate-x-0
                   transition-transform duration-300 ease-in-out"
            :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'">

            <!-- Sidebar Header -->
            <div class="p-4 bg-blue-800 flex items-center justify-between md:block">
                <h2 class="font-bold text-2xl">Sales</h2>

                <!-- Close Button (Mobile Only) -->
                <button class="md:hidden text-2xl" @click="sidebarOpen = false">
                    <i class="bi bi-x-lg"></i>
                </button>
            </div>

            <!-- MENU -->
            <nav class="mt-4 flex flex-col gap-1">

                <a href="{{ route('sales.dashboard') }}"
                    class="flex items-center gap-3 px-5 py-3 rounded-lg
                    {{ request()->routeIs('sales.dashboard') ? 'bg-blue-500' : 'hover:bg-blue-600' }}">
                    <i class="bi bi-speedometer2"></i> Dashboard
                </a>

                <a href="{{ route('sales.pickup.create') }}"
                    class="flex items-center gap-3 px-5 py-3 rounded-lg
                    {{ request()->routeIs('sales.pickup.create') ? 'bg-blue-500' : 'hover:bg-blue-600' }}">
                    <i class="bi bi-plus-circle"></i> Buat Pengambilan Alat
                </a>

                <a href="{{ route('sales.pickup.history') }}"
                    class="flex items-center gap-3 px-5 py-3 rounded-lg
                    {{ request()->routeIs('sales.pickup.history') ? 'bg-blue-500' : 'hover:bg-blue-600' }}">
                    <i class="bi bi-clock-history"></i> History Pickup
                </a>

            </nav>

            <!-- FOOTER -->
            <div class="p-4 border-t border-blue-600 text-xs text-blue-200 mt-4">
                © 2025 PT. Rukun Sejahtera Teknik
            </div>

        </aside>

        <!-- CONTENT -->
        <main class="flex-1 p-6">
            @yield('content')
        </main>

    </div>

</body>
</html>
