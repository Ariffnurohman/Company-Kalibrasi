<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Panel Teknisi - Rukun Calibration Laboratory</title>
    <link rel="icon" type="image/png" href="{{ asset('images/rukun-logo_5.png') }}">
    
    {{-- Vite (Tailwind + DaisyUI) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    {{-- AlpineJS untuk animasi sidebar --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-gray-50 text-gray-800 antialiased font-sans" x-data="{ sidebarOpen: false }">

    <div class="flex min-h-screen">

        <div class="fixed inset-0 bg-gray-900/40 backdrop-blur-sm z-40 md:hidden"
            x-show="sidebarOpen"
            x-transition.opacity
            @click="sidebarOpen = false">
        </div>

        <aside
            class="fixed md:static top-0 left-0 h-full w-64 bg-white shadow-sm border-r border-gray-200
                   transform -translate-x-full md:translate-x-0
                   transition-transform duration-300 ease-in-out z-50"
            :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'">

            <div class="h-16 px-6 border-b border-gray-100 flex items-center justify-between">
                <div class="flex items-center gap-2.5">
                    <div class="p-2 bg-blue-600 rounded-xl text-white flex items-center justify-center shadow-md shadow-blue-600/10">
                        <i class="bi bi-shield-shaded text-lg"></i>
                    </div>
                    <div>
                        <h2 class="font-bold text-base text-gray-900 tracking-tight leading-none">RUKUN LAB</h2>
                        <span class="text-[10px] text-gray-400 font-semibold tracking-wider uppercase mt-1 block">Technician Panel</span>
                    </div>
                </div>

                <button class="md:hidden text-gray-400 hover:text-gray-700 transition-colors text-xl" @click="sidebarOpen = false">
                    <i class="bi bi-x-lg"></i>
                </button>
            </div>

            <div class="p-4">
                <p class="px-3 text-[11px] font-bold text-gray-400 uppercase tracking-wider mb-2">Menu Utama</p>
                <ul class="space-y-1 text-sm font-medium">
                    <li>
                        <a href="{{ route('technician.dashboard') }}"
                            class="flex items-center gap-3 rounded-xl px-4 py-2.5 transition-all duration-150
                            {{ request()->is('technician/dashboard')
                                ? 'bg-blue-600 text-white font-semibold shadow-md shadow-blue-600/10'
                                : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                            <i class="bi bi-grid-1x2-fill text-base"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('technician.orders.index') }}"
                            class="flex items-center gap-3 rounded-xl px-4 py-2.5 transition-all duration-150
                            {{ request()->is('technician/orders*')
                                ? 'bg-blue-600 text-white font-semibold shadow-md shadow-blue-600/10'
                                : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                            <i class="bi bi-collection-fill text-base"></i>
                            <span>Orders / Tugas</span>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>

        <main class="flex-1 flex flex-col min-w-0">

            <nav class="bg-white/90 backdrop-blur-md px-6 h-16 flex items-center justify-between 
                        border-b border-gray-100 sticky top-0 z-40 shadow-sm">

                <button class="text-gray-600 hover:text-gray-900 transition-colors p-1 -ml-1 md:hidden" @click="sidebarOpen = true">
                    <i class="bi bi-list text-2xl"></i>
                </button>

                <div class="flex items-center">
                    <img src="{{ asset('images/rukun-logo_5.png') }}"
                        alt="Rukun Calibration Laboratory Logo"
                        class="h-8 w-auto object-contain">
                </div>

                <div class="flex items-center gap-4">

                    <button class="text-gray-400 hover:text-gray-600 transition-colors relative p-1.5 rounded-full hover:bg-gray-50">
                        <i class="bi bi-bell text-lg"></i>
                        <span class="absolute top-1 right-1 w-2 h-2 bg-blue-500 rounded-full"></span>
                    </button>

                    <div class="dropdown dropdown-end">
                        <label tabindex="0"
                            class="flex items-center gap-3 cursor-pointer pl-2 pr-3 py-1.5 hover:bg-gray-50 border border-transparent hover:border-gray-100 rounded-xl transition-all">
                            
                            <div class="w-8 h-8 rounded-xl bg-blue-50 flex items-center justify-center text-blue-600 border border-blue-100 font-bold text-sm shadow-sm">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>
                            
                            <div class="hidden sm:block text-left">
                                <p class="text-xs font-semibold text-gray-900 leading-none">{{ Auth::user()->name }}</p>
                                <span class="text-[10px] text-gray-400 font-medium block mt-0.5">Teknisi Lab</span>
                            </div>
                            <i class="bi bi-chevron-down text-xs text-gray-400 hidden sm:block"></i>
                        </label>

                        <ul tabindex="0"
                            class="dropdown-content menu p-1.5 shadow-xl bg-white 
                                   rounded-xl w-56 border border-gray-100 mt-2">
                            
                            <li class="px-3 py-2 border-b border-gray-50 sm:hidden mb-1">
                                <p class="text-xs font-semibold text-gray-900">{{ Auth::user()->name }}</p>
                                <span class="text-[10px] text-gray-400">Teknisi Lab</span>
                            </li>

                            <li>
                                <a href="{{ route('technician.profile') }}"
                                    class="flex items-center gap-2.5 px-3 py-2 rounded-lg text-gray-600 hover:bg-gray-50 hover:text-gray-900 transition-all text-sm">
                                    <i class="bi bi-person text-base text-gray-400"></i>
                                    <span>Profil Saya</span>
                                </a>
                            </li>

                            <div class="my-1 border-t border-gray-100"></div>

                            <li>
                                <form action="{{ route('logout') }}" method="POST" class="w-full p-0">
                                    @csrf
                                    <button class="w-full flex items-center gap-2.5 px-3 py-2 rounded-lg text-red-600 hover:bg-red-50 text-left transition-all text-sm font-medium">
                                        <i class="bi bi-box-arrow-right text-base"></i>
                                        <span>Keluar Aplikasi</span>
                                    </button>
                                </form>
                            </li>

                        </ul>
                    </div>
                </div>
            </nav>

            <div class="p-6 flex-1 bg-gray-50">
                @yield('content')
            </div>

        </main>

    </div>

</body>

</html>