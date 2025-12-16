<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Teknisi Panel</title>
    <link rel="icon" type="image/png" href="{{ asset('images/rukun-logo_5.png') }}">
    {{-- Vite (Tailwind + DaisyUI) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    {{-- AlpineJS untuk animasi sidebar --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-gray-100 text-gray-700" x-data="{ sidebarOpen: false }">

    <div class="flex min-h-screen">

        <!-- BACKDROP MOBILE -->
        <div class="fixed inset-0 bg-black/40 z-40 md:hidden"
            x-show="sidebarOpen"
            x-transition.opacity
            @click="sidebarOpen = false">
        </div>

        <!-- SIDEBAR (Mobile + Desktop) -->
        <aside
            class="fixed md:static top-0 left-0 h-full w-64 bg-white shadow-lg border-r border-gray-200
                   transform -translate-x-full md:translate-x-0
                   transition-transform duration-300 ease-in-out z-50"
            :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'">

            <!-- Header -->
            <div class="p-6 border-b border-gray-200 flex items-center justify-between md:block">
                <div>
                    <h2 class="font-bold text-xl text-gray-800">Teknisi</h2>
                    <p class="text-sm text-gray-500">Technician Panel</p>
                </div>

                <!-- Close Button (Mobile Only) -->
                <button class="md:hidden text-2xl" @click="sidebarOpen = false">
                    <i class="bi bi-x-lg"></i>
                </button>
            </div>

            <ul class="menu p-4 text-base gap-1 text-gray-700">

                <!-- Dashboard -->
                <li>
                    <a href="{{ route('technician.dashboard') }}"
                        class="flex items-center gap-2 rounded-lg px-3 py-2
                        {{ request()->is('technician/dashboard')
                            ? 'bg-blue-600 text-white'
                            : 'hover:bg-gray-100' }}">
                        <i class="bi bi-speedometer2 text-lg"></i>
                        Dashboard
                    </a>
                </li>

                <!-- Orders -->
                <li>
                    <a href="{{ route('technician.orders.index') }}"
                        class="flex items-center gap-2 rounded-lg px-3 py-2
                        {{ request()->is('technician/orders*')
                            ? 'bg-blue-600 text-white'
                            : 'hover:bg-gray-100' }}">
                        <i class="bi bi-receipt text-lg"></i>
                        Orders
                    </a>
                </li>

            </ul>
        </aside>

        <!-- MAIN CONTENT -->
        <main class="flex-1">

            <!-- TOP NAV -->
            <nav class="bg-white shadow-md px-6 h-16 flex items-center justify-between 
                        border-b border-gray-200 sticky top-0 z-50">

                <!-- Hamburger (Mobile) -->
                <button class="text-3xl md:hidden" @click="sidebarOpen = true">
                    <i class="bi bi-list"></i>
                </button>


                <img src="{{ asset('images/rukun-logo_5.png') }}"
                    alt="Admin Panel"
                    class="h-8 inline-block">

                <div class="flex items-center gap-4">

                    <!-- PROFILE DROPDOWN -->
                    <div class="dropdown dropdown-end">
                        <label tabindex="0"
                            class="flex items-center gap-2 cursor-pointer px-3 py-2 hover:bg-gray-100 rounded-lg">
                            <i class="bi bi-person-circle text-2xl text-gray-700"></i>
                            <span class="font-medium text-gray-700">{{ Auth::user()->name }}</span>
                        </label>

                        <ul tabindex="0"
                            class="dropdown-content menu p-2 shadow bg-white 
                                   rounded-lg w-52 border border-gray-200">

                            <li>
                                <a href="{{ route('technician.profile') }}"
                                    class="hover:bg-gray-100 rounded-md">
                                    Profile
                                </a>
                            </li>

                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="text-red-500 hover:bg-gray-100 rounded-md px-2 py-1">
                                    Logout
                                </button>
                            </form>

                        </ul>
                    </div>
                </div>
            </nav>

            <!-- PAGE CONTENT -->
            <div class="p-6">
                @yield('content')
            </div>

        </main>

    </div>

</body>

</html>