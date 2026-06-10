<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Panel Admin - Rukun Calibration Laboratory</title>
    <link rel="icon" type="image/png" href="{{ asset('images/rukun-logo_5.png') }}">

    {{-- Tailwind + DaisyUI via Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    {{-- AlpineJS untuk kontrol interaksi UI --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-gray-50 text-gray-800 antialiased font-sans" x-data="{ sidebarOpen: false }">

    <div class="flex min-h-screen">

        <aside
            class="fixed md:static top-0 left-0 h-full w-64 bg-white border-r border-gray-200 z-[60]
            transform -translate-x-full md:translate-x-0
            transition-transform duration-300 ease-in-out flex flex-col justify-between"
            :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'">

            <div>
                <div class="h-16 px-6 border-b border-gray-100 flex items-center justify-between">
                    <div class="flex items-center gap-2.5">
                        <div class="p-2 bg-indigo-600 rounded-xl text-white flex items-center justify-center shadow-lg shadow-indigo-600/10">
                            <i class="bi bi-speedometer text-lg"></i>
                        </div>
                        <div>
                            <h2 class="font-bold text-base text-gray-900 tracking-tight leading-none">RUKUN ADMIN</h2>
                            <span class="text-[10px] text-gray-400 font-semibold tracking-wider uppercase mt-1 block">Control Panel</span>
                        </div>
                    </div>

                    {{-- Close Button (Mobile Only) --}}
                    <button class="md:hidden text-gray-400 hover:text-gray-700 transition-colors text-xl" @click="sidebarOpen = false">
                        <i class="bi bi-x-lg"></i>
                    </button>
                </div>

                <div class="p-4">
                    <p class="px-3 text-[11px] font-bold text-gray-400 uppercase tracking-wider mb-2">Navigasi Utama</p>
                    <ul class="space-y-1 text-sm font-medium">
                        <li>
                            <a href="{{ route('admin.dashboard') }}"
                                class="flex items-center gap-3 px-4 py-2.5 rounded-xl transition-all duration-150
                               {{ request()->is('admin/dashboard') ? 'bg-indigo-600 text-white font-semibold shadow-md shadow-indigo-600/10' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                                <i class="bi bi-grid-1x2-fill text-base"></i> <span>Dashboard</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('admin.orders.index') }}"
                                class="flex items-center gap-3 px-4 py-2.5 rounded-xl transition-all duration-150
                               {{ request()->is('admin/orders*') ? 'bg-indigo-600 text-white font-semibold shadow-md shadow-indigo-600/10' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                                <i class="bi bi-receipt-cutoff text-base"></i> <span>Orders / Transaksi</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('admin.pickups.index') }}"
                                class="flex items-center gap-3 px-4 py-2.5 rounded-xl transition-all duration-150
                               {{ request()->is('admin/pickups*') ? 'bg-indigo-600 text-white font-semibold shadow-md shadow-indigo-600/10' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                                <i class="bi bi-box-seam-fill text-base"></i> <span>Pengambilan Alat</span>
                            </a>
                        </li>
                        
                        <p class="px-3 text-[11px] font-bold text-gray-400 uppercase tracking-wider pt-4 mb-2">Sistem</p>
                        <li>
                            <a href="#" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-gray-600 hover:bg-gray-50 hover:text-gray-900 transition-all">
                                <i class="bi bi-gear-fill text-base"></i> <span>Settings</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            {{-- Sidebar Footer --}}
            <div class="p-4 border-t border-gray-100 bg-gray-50/50 text-center text-[11px] font-medium text-gray-400 tracking-wide">
                © {{ date('Y') }} PT. Rukun Sejahtera Teknik
            </div>

        </aside>

        <div class="fixed inset-0 bg-gray-900/40 backdrop-blur-sm z-50 md:hidden"
            x-show="sidebarOpen"
            x-transition.opacity
            @click="sidebarOpen = false">
        </div>

        <main class="flex-1 flex flex-col min-w-0">

            <nav class="bg-white/90 backdrop-blur-md px-6 h-16 sticky top-0 z-[40] flex items-center justify-between border-b border-gray-100 shadow-sm">

                {{-- Hamburger Trigger Menu (Mobile Only) --}}
                <button class="text-gray-600 hover:text-gray-900 transition-colors p-1 -ml-1 md:hidden" @click="sidebarOpen = true">
                    <i class="bi bi-list text-2xl"></i>
                </button>

                <div class="flex items-center">
                    <img src="{{ asset('images/rukun-logo_5.png') }}" alt="Rukun Lab Logo" class="h-8 w-auto object-contain">
                </div>

                {{-- Right Actions Group (Notifications + Profile) --}}
                <div class="flex items-center gap-2">

                    {{-- Notifications Component Dropdown --}}
                    <div class="dropdown dropdown-end">
                        <label tabindex="0" class="btn btn-ghost btn-circle hover:bg-gray-50 relative">
                            <div class="indicator">
                                <i class="bi bi-bell text-xl text-gray-500"></i>
                                @if(($notifications ?? collect())->count() > 0)
                                <span class="w-2 h-2 bg-rose-500 rounded-full absolute top-2 right-2 ring-2 ring-white"></span>
                                @endif
                            </div>
                        </label>

                        <ul tabindex="0" class="dropdown-content menu p-2 shadow-xl bg-white w-80 rounded-2xl border border-gray-100 mt-2">
                            <div class="px-3 py-2 border-b border-gray-50">
                                <span class="font-bold text-sm text-gray-900">Notifikasi Terbaru</span>
                            </div>
                            @forelse($notifications ?? [] as $notification)
                            <li>
                                <a class="hover:bg-gray-50 rounded-xl p-3 text-xs text-gray-600 transition-colors leading-relaxed">
                                    {{ $notification->data['message'] }}
                                </a>
                            </li>
                            @empty
                            <div class="p-6 text-center text-gray-400">
                                <i class="bi bi-bell-slash text-2xl block mb-1 text-gray-300"></i>
                                <span class="text-xs">Tidak ada notifikasi baru</span>
                            </div>
                            @endforelse
                        </ul>
                    </div>

                    {{-- Profile Menu Dropdown --}}
                    <div class="dropdown dropdown-end">
                        <label tabindex="0" class="flex items-center gap-2.5 cursor-pointer pl-2 pr-3 py-1.5 hover:bg-gray-50 border border-transparent hover:border-gray-100 rounded-xl transition-all">
                            <div class="w-8 h-8 rounded-xl bg-indigo-50 border border-indigo-100 text-indigo-600 font-bold text-sm flex items-center justify-center shadow-sm">
                                A
                            </div>
                            <span class="hidden md:inline font-semibold text-xs text-gray-900 leading-none">Administrator</span>
                            <i class="bi bi-chevron-down text-[10px] text-gray-400 hidden md:block"></i>
                        </label>

                        <ul tabindex="0" class="dropdown-content menu p-1.5 shadow-xl bg-white rounded-xl w-52 border border-gray-100 mt-2">
                            <li>
                                <a href="{{ route('admin.profile') }}" class="flex items-center gap-2.5 px-3 py-2 rounded-lg text-gray-600 hover:bg-gray-50 text-sm">
                                    <i class="bi bi-person text-base text-gray-400"></i> Profil Saya
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center gap-2.5 px-3 py-2 rounded-lg text-gray-600 hover:bg-gray-50 text-sm">
                                    <i class="bi bi-gear text-base text-gray-400"></i> Pengaturan
                                </a>
                            </li>
                            <div class="my-1 border-t border-gray-100"></div>
                            <li>
                                <form action="{{ route('logout') }}" method="POST" class="w-full p-0">
                                    @csrf
                                    <button class="w-full flex items-center gap-2.5 px-3 py-2 rounded-lg text-red-600 hover:bg-red-50 text-left transition-all text-sm font-medium">
                                        <i class="bi bi-box-arrow-right text-base"></i> Keluar
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>

                </div>
            </nav>

            {{-- PAGE MAIN CONTENT RENDERING --}}
            <div class="p-6 flex-1 bg-gray-50">
                @yield('content')
            </div>

        </main>

    </div>

</body>

</html>