<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin Panel</title>

    {{-- Tailwind + DaisyUI --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
</head>

<body class="bg-gray-100 text-gray-700" x-data="{ sidebarOpen: false }">

    <div class="flex min-h-screen">

        {{-- SIDEBAR --}}
        <aside
            class="fixed md:static top-0 left-0 h-full w-64 bg-white shadow-lg z-[60]
            transform -translate-x-full md:translate-x-0
            transition-transform duration-300 ease-in-out"
            :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'">

            {{-- Sidebar Header --}}
            <div class="p-6 border-b border-gray-200 flex items-center justify-between md:block">
                <div>
                    <h2 class="font-bold text-2xl text-gray-800">Admin</h2>
                    <p class="text-sm text-gray-500 hidden md:block mt-1">Control Panel</p>
                </div>

                {{-- Close Button (Mobile Only) --}}
                <button class="md:hidden text-2xl" @click="sidebarOpen = false">
                    <i class="bi bi-x-lg"></i>
                </button>
            </div>

            {{-- Menu --}}
            <ul class="menu p-4 text-gray-700 flex flex-col gap-1">

                <li>
                    <a href="{{ route('admin.dashboard') }}"
                        class="flex items-center gap-2 px-3 py-2 rounded-lg
                       {{ request()->is('admin/dashboard') ? 'bg-primary text-white' : 'hover:bg-gray-100' }}">
                        <i class="bi bi-speedometer2"></i> Dashboard
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.orders.index') }}"
                        class="flex items-center gap-2 px-3 py-2 rounded-lg
                       {{ request()->is('admin/orders*') ? 'bg-primary text-white' : 'hover:bg-gray-100' }}">
                        <i class="bi bi-receipt-cutoff"></i> Orders
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.pickups.index') }}"
                        class="flex items-center gap-2 px-3 py-2 rounded-lg
                       {{ request()->is('admin/pickups*') ? 'bg-primary text-white' : 'hover:bg-gray-100' }}">
                        <i class="bi bi-box-seam"></i> Pengambilan Alat
                    </a>
                </li>

                <li>
                    <a href="#" class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-gray-100">
                        <i class="bi bi-gear"></i> Settings
                    </a>
                </li>

            </ul>

            {{-- Footer --}}
            <div class="p-4 border-t border-gray-200 text-xs text-gray-400">
                © 2025 Company Name
            </div>

        </aside>

        {{-- BACKDROP MOBILE --}}
        <div
            class="fixed inset-0 bg-black/40 z-50 md:hidden"
            x-show="sidebarOpen"
            x-transition.opacity
            @click="sidebarOpen = false">
        </div>

        {{-- MAIN CONTENT AREA --}}
        <main class="flex-1 flex flex-col">

            {{-- TOP NAV --}}
            <nav class="bg-white shadow-md px-6 py-3 sticky top-0 z-[40] flex items-center justify-between">

                {{-- Hamburger (Mobile) --}}
                <button class="md:hidden text-3xl" @click="sidebarOpen = true">
                    <i class="bi bi-list"></i>
                </button>

                <span class="text-xl font-semibold">Admin Panel</span>

                {{-- Right Icons --}}
                <div class="flex items-center space-x-4">

                    {{-- Notifications --}}
                    <div class="dropdown dropdown-end">
                        <label tabindex="0" class="btn btn-ghost btn-circle">
                            <div class="indicator">
                                <i class="bi bi-bell text-2xl text-gray-700"></i>
                                @if(($notifications ?? collect())->count() > 0)
                                <span class="badge badge-sm bg-red-500 text-white indicator-item">
                                    {{ $notifications->count() }}
                                </span>
                                @endif
                            </div>
                        </label>

                        <ul tabindex="0"
                            class="dropdown-content menu p-2 shadow-lg bg-white w-72 rounded-lg">
                            @forelse($notifications ?? [] as $notification)
                            <li><a class="hover:bg-gray-100 rounded-md p-2">{{ $notification->data['message'] }}</a></li>
                            @empty
                            <li><span class="p-2 text-gray-500">Tidak ada notifikasi baru</span></li>
                            @endforelse
                        </ul>
                    </div>

                    {{-- Profile --}}
                    <div class="dropdown dropdown-end">
                        <label tabindex="0" class="btn btn-ghost flex items-center gap-2">
                            <i class="bi bi-person-circle text-2xl"></i>
                            <span class="hidden md:inline font-medium">Admin</span>
                        </label>

                        <ul tabindex="0" class="dropdown-content menu p-2 shadow-lg bg-white rounded-lg w-52">

                            {{-- LINK PROFILE --}}
                            <li>
                                <a href="{{ route('admin.profile') }}">
                                    <i class="bi bi-person-fill me-2"></i> Profile
                                </a>
                            </li>

                            {{-- SETTINGS (kalau belum ada biarkan saja) --}}
                            <li>
                                <a href="#">
                                    <i class="bi bi-gear-fill me-2"></i> Settings
                                </a>
                            </li>

                            {{-- LOGOUT --}}
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button class="text-red-500 flex items-center">
                                        <i class="bi bi-box-arrow-right me-2"></i> Logout
                                    </button>
                                </form>
                            </li>

                        </ul>

                    </div>

                </div>
            </nav>

            {{-- PAGE CONTENT --}}
            <div class="p-6">
                @yield('content')
            </div>

        </main>

    </div>

</body>

</html>