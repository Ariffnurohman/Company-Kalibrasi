<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Technician Panel</title>

    {{-- Vite (Tailwind + DaisyUI otomatis) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

</head>

<body class="bg-base-200">

    <div class="flex min-h-screen">

        {{-- SIDEBAR --}}
        <aside class="w-64 bg-base-100 shadow-lg hidden md:block">
            <div class="p-6 border-b">
                <h2 class="font-bold text-xl">Teknisi</h2>
                <p class="text-sm text-gray-500">Technician Panel</p>
            </div>

            <ul class="menu p-4 text-base gap-1">

                <li>
                    <a href="{{ route('technician.dashboard') }}"
                       class="{{ request()->is('technician/dashboard') ? 'active bg-primary text-white' : '' }}">
                        <i class="bi bi-speedometer2"></i> Dashboard
                    </a>
                </li>

                <li>
                    <a href="{{ route('technician.orders.index') }}"
                       class="{{ request()->is('technician/orders*') ? 'active bg-primary text-white' : '' }}">
                        <i class="bi bi-receipt"></i> Orders
                    </a>
                </li>


            </ul>
        </aside>

        {{-- MAIN CONTENT --}}
        <main class="flex-1">

            {{-- TOP NAV --}}
            <nav class="navbar bg-base-100 shadow-md px-6 sticky top-0 z-50">
                <div class="flex-1">
                    <span class="text-lg font-semibold">Technician Panel</span>
                </div>

                <div class="flex-none gap-3">

                    {{-- PROFILE --}}
                    <div class="dropdown dropdown-end">
                        <label tabindex="0" class="btn btn-ghost">
                            <i class="bi bi-person-circle text-xl"></i>
                            <span class="ml-2">{{ Auth::user()->name }}</span>
                        </label>

                        <ul tabindex="0"
                            class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-52">

                            <li><a>Profile</a></li>

                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button class="text-red-500">Logout</button>
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
