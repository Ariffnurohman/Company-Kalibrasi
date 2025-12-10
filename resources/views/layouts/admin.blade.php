<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin Panel</title>

    {{-- Vite (Tailwind + DaisyUI otomatis) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

</head>

<body class="bg-gray-100 font-sans text-gray-700">
    <div class="flex min-h-screen">

        {{-- SIDEBAR --}}
        <aside class="w-64 bg-white shadow-lg hidden md:flex flex-col">
            <div class="p-6 border-b border-gray-200">
                <h2 class="font-bold text-2xl text-gray-800">Admin</h2>
                <p class="text-sm text-gray-500 mt-1">Control Panel</p>
            </div>

            <ul class="menu p-4 flex-1 flex flex-col gap-1 text-gray-600">

                <li>
                    <a href="{{ route('admin.dashboard') }}"
                       class="{{ request()->is('admin/dashboard') ? 'bg-primary text-white rounded-lg' : 'hover:bg-gray-100 rounded-lg' }}">
                        <i class="bi bi-speedometer2 mr-2"></i> Dashboard
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.orders.index') }}"
                       class="{{ request()->is('admin/orders*') ? 'bg-primary text-white rounded-lg' : 'hover:bg-gray-100 rounded-lg' }}">
                        <i class="bi bi-receipt-cutoff mr-2"></i> Orders
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.pickups.index') }}"
                       class="{{ request()->is('admin/pickups*') ? 'bg-primary text-white rounded-lg' : 'hover:bg-gray-100 rounded-lg' }}">
                        <i class="bi bi-box-seam mr-2"></i> Pengambilan Alat
                    </a>
                </li>

                <li>
                    <a href="#" class="hover:bg-gray-100 rounded-lg">
                        <i class="bi bi-gear mr-2"></i> Settings
                    </a>
                </li>

            </ul>

            <div class="p-4 border-t border-gray-200">
                <span class="text-xs text-gray-400">© 2025 Company Name</span>
            </div>
        </aside>

        {{-- MAIN CONTENT --}}
        <main class="flex-1 flex flex-col">

            {{-- TOP NAV --}}
            <nav class="bg-white shadow-md px-6 py-3 sticky top-0 z-50 flex justify-between items-center">
                <span class="text-xl font-semibold text-gray-800">Admin Panel</span>

                <div class="flex items-center space-x-4">

                    {{-- NOTIFICATION --}}
                    <div class="dropdown dropdown-end">
                        <label tabindex="0" class="btn btn-ghost btn-circle">
                            <div class="indicator">
                                <i class="bi bi-bell text-2xl text-gray-600"></i>
                                @if($notifications->count() > 0)
                                <span class="badge badge-sm indicator-item bg-red-500 text-white">
                                    {{ $notifications->count() }}
                                </span>
                                @endif
                            </div>
                        </label>

                        <ul tabindex="0"
                            class="dropdown-content menu p-2 shadow-lg bg-white w-80 rounded-lg">

                            @forelse($notifications as $notification)
                                <li>
                                    <a href="{{ route('admin.pickups.index') }}"
                                       class="hover:bg-gray-100 rounded-md px-2 py-1">
                                        {{ $notification->data['message'] }}
                                    </a>
                                </li>
                            @empty
                                <li>
                                    <span class="p-2 text-gray-500">Tidak ada notifikasi baru</span>
                                </li>
                            @endforelse

                        </ul>
                    </div>

                    {{-- PROFILE --}}
                    <div class="dropdown dropdown-end">
                        <label tabindex="0" class="btn btn-ghost flex items-center space-x-2">
                            <i class="bi bi-person-circle text-2xl text-gray-600"></i>
                            <span class="hidden md:inline text-gray-700 font-medium">Admin</span>
                        </label>

                        <ul tabindex="0"
                            class="dropdown-content menu p-2 shadow-lg bg-white rounded-lg w-52">
                            <li><a class="hover:bg-gray-100 rounded-md px-2 py-1">Profile</a></li>
                            <li><a class="hover:bg-gray-100 rounded-md px-2 py-1">Settings</a></li>
                            <li>
                                <form action="#" method="POST">
                                    <button type="submit" class="text-red-500 w-full text-left px-2 py-1 rounded-md hover:bg-gray-100">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>

                </div>
            </nav>

            {{-- PAGE CONTENT --}}
            <div class="p-6 flex-1 overflow-auto">
                @yield('content')
            </div>

        </main>
    </div>

</body>

</html>
