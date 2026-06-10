@extends('layouts.technician')

@section('content')
<div class="container mx-auto px-4 py-6">
    
    {{-- Header Section --}}
    <div class="mb-8 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 tracking-tight">Dashboard Teknisi</h1>
            <p class="text-sm text-gray-500 mt-1">Pantau, kelola, dan selesaikan order kalibrasi Anda secara real-time.</p>
        </div>
        {{-- Widget Tanggal Hari Ini --}}
        <div class="text-sm text-gray-600 bg-gray-50 px-4 py-2.5 rounded-xl border border-gray-200 inline-flex items-center gap-2.5 shadow-sm self-start md:self-center">
            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
            </svg>
            <span class="font-medium">{{ now()->translatedFormat('l, d F Y') }}</span>
        </div>
    </div>

    {{-- Statistik Section --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-8">

        {{-- Assigned Orders --}}
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-200 border-l-4 border-l-indigo-500 flex items-center justify-between transition-all duration-200 hover:shadow-md">
            <div>
                <p class="text-sm font-medium text-gray-500 uppercase tracking-wider">Assigned Orders</p>
                <p class="text-3xl font-bold text-gray-900 mt-2">{{ $assignedOrders }}</p>
                <p class="text-xs text-gray-400 mt-1">Menunggu peninjauan Anda</p>
            </div>
            <div class="p-3 bg-indigo-50 text-indigo-600 rounded-xl">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                </svg>
            </div>
        </div>

        {{-- In Progress --}}
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-200 border-l-4 border-l-blue-500 flex items-center justify-between transition-all duration-200 hover:shadow-md">
            <div>
                <p class="text-sm font-medium text-gray-500 uppercase tracking-wider">In Progress</p>
                <p class="text-3xl font-bold text-blue-600 mt-2">{{ $inProgress }}</p>
                <p class="text-xs text-gray-400 mt-1">Sedang dalam proses kalibrasi</p>
            </div>
            <div class="p-3 bg-blue-50 text-blue-600 rounded-xl">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                </svg>
            </div>
        </div>

        {{-- Completed --}}
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-200 border-l-4 border-l-green-500 flex items-center justify-between transition-all duration-200 hover:shadow-md">
            <div>
                <p class="text-sm font-medium text-gray-500 uppercase tracking-wider">Completed</p>
                <p class="text-3xl font-bold text-green-600 mt-2">{{ $completed }}</p>
                <p class="text-xs text-gray-400 mt-1">Sertifikat berhasil diterbitkan</p>
            </div>
            <div class="p-3 bg-green-50 text-green-600 rounded-xl">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
        </div>

    </div>


    {{-- Recent Orders Section --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden transition-all duration-200 hover:shadow-md">

        {{-- Table Header & Filter --}}
        <div class="p-5 border-b border-gray-100 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 bg-gray-50/50">
            <div>
                <h2 class="text-lg font-bold text-gray-900">Recent Orders</h2>
                <p class="text-xs text-gray-500 mt-0.5">Daftar pengerjaan instrumen terbaru yang ditugaskan kepada Anda.</p>
            </div>

            {{-- Search Filter Modern --}}
            <form method="GET" class="relative w-full sm:w-64">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </span>
                <input 
                    type="text" 
                    name="search" 
                    value="{{ request('search') }}"
                    placeholder="Cari nomor order / alat..."
                    class="w-full pl-9 pr-4 py-2 border border-gray-300 rounded-xl text-sm focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 focus:outline-none transition-all shadow-sm"
                >
            </form>
        </div>

        {{-- Responsive Table --}}
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 text-sm">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3.5 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">No. Order</th>
                        <th scope="col" class="px-6 py-3.5 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Nama Instrumen / Alat</th>
                        <th scope="col" class="px-6 py-3.5 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
                        <th scope="col" class="px-6 py-3.5 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Pembaruan</th>
                        <th scope="col" class="px-6 py-3.5 class='text-right' text-xs font-semibold text-gray-500 uppercase tracking-wider text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody class="bg-white divide-y divide-gray-100">
                    @forelse ($recentOrders as $o)
                    <tr class="hover:bg-gray-50/70 transition-all duration-150">
                        <td class="px-6 py-4 font-semibold text-gray-900 whitespace-nowrap">{{ $o->order_number }}</td>
                        <td class="px-6 py-4 text-gray-700 whitespace-nowrap">{{ $o->instrument }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @php
                                // Klasifikasi Badge UI Premium berbasis Ring & Inset
                                $badgeStyle = match($o->status) {
                                    'Completed' => 'bg-green-50 text-green-700 ring-green-600/20',
                                    'Calibration' => 'bg-amber-50 text-amber-700 ring-amber-600/20',
                                    'Processing' => 'bg-blue-50 text-blue-700 ring-blue-600/20',
                                    default => 'bg-gray-50 text-gray-600 ring-gray-500/10',
                                };
                            @endphp

                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold ring-1 ring-inset {{ $badgeStyle }}">
                                <span class="w-1.5 h-1.5 rounded-full mr-1.5 {{ match($o->status){'Completed'=>'bg-green-500', 'Calibration'=>'bg-amber-500', 'Processing'=>'bg-blue-500', default=>'bg-gray-400'} }}"></span>
                                {{ $o->status }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-gray-500 whitespace-nowrap">{{ $o->updated_at->diffForHumans() }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">
                            <a href="#" class="inline-flex items-center gap-1 text-sm font-semibold text-blue-600 hover:text-blue-800 transition-colors">
                                Detail 
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            </a>
                        </td>
                    </tr>

                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-gray-400">
                            <svg class="w-12 h-12 mx-auto text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0a2 2 0 01-2 2H6a2 2 0 01-2-2m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                            </svg>
                            <p class="text-base font-medium text-gray-500">Tidak ada order ditemukan</p>
                            <p class="text-xs text-gray-400 mt-1">Coba sesuaikan kata kunci pencarian Anda.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection