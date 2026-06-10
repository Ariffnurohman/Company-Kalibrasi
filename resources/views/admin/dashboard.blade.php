@extends('layouts.admin')

@section('content')
<div class="max-w-7xl mx-auto">

    {{-- PAGE TITLE & SUBTITLE --}}
    <div class="mb-8">
        <h3 class="text-2xl font-bold text-gray-900 tracking-tight">Admin Dashboard</h3>
        <p class="text-sm text-gray-500 mt-1">Ringkasan aktivitas operasional dan performa laboratorium kalibrasi secara real-time.</p>
    </div>


    {{-- ================= SUMMARY STATS CARDS ================= --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-8">

        {{-- Total Orders --}}
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-200 border-l-4 border-l-indigo-600 flex items-center justify-between transition-all duration-200 hover:shadow-md">
            <div>
                <p class="text-sm font-medium text-gray-500 uppercase tracking-wider">Total Orders</p>
                <p class="text-3xl font-bold text-gray-900 mt-2">{{ $totalOrders }}</p>
                <p class="text-xs text-gray-400 mt-1">Seluruh akumulasi order terdaftar</p>
            </div>
            <div class="p-3.5 bg-indigo-50 text-indigo-600 rounded-xl">
                <i class="bi bi-clipboard-check-fill text-2xl"></i>
            </div>
        </div>

        {{-- Completed Orders --}}
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-200 border-l-4 border-l-emerald-500 flex items-center justify-between transition-all duration-200 hover:shadow-md">
            <div>
                <p class="text-sm font-medium text-gray-500 uppercase tracking-wider">Completed Orders</p>
                <p class="text-3xl font-bold text-emerald-600 mt-2">{{ $completedOrders }}</p>
                <p class="text-xs text-gray-400 mt-1">Sertifikat berhasil diselesaikan</p>
            </div>
            <div class="p-3.5 bg-emerald-50 text-emerald-600 rounded-xl">
                <i class="bi bi-check-circle-fill text-2xl"></i>
            </div>
        </div>

        {{-- Pending Orders --}}
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-200 border-l-4 border-l-amber-500 flex items-center justify-between transition-all duration-200 hover:shadow-md">
            <div>
                <p class="text-sm font-medium text-gray-500 uppercase tracking-wider">Pending Orders</p>
                <p class="text-3xl font-bold text-amber-600 mt-2">{{ $pendingOrders }}</p>
                <p class="text-xs text-gray-400 mt-1">Menunggu peninjauan dan antrean</p>
            </div>
            <div class="p-3.5 bg-amber-50 text-amber-50 rounded-xl text-amber-600">
                <i class="bi bi-clock-history text-2xl"></i>
            </div>
        </div>

    </div>


    {{-- ================= RECENT ORDERS TABLE ================= --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden transition-all duration-200 hover:shadow-md">
        
        {{-- Table Section Header --}}
        <div class="p-5 border-b border-gray-100 bg-gray-50/50">
            <h6 class="text-lg font-bold text-gray-900">Recent Orders</h6>
            <p class="text-xs text-gray-500 mt-0.5">Daftar transaksi kalibrasi instrumen terbaru masuk ke dalam sistem.</p>
        </div>

        {{-- Modern Responsive Table Layout --}}
        <div class="overflow-x-auto">
            <table class="w-full text-sm divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="py-3.5 px-6 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">ID</th>
                        <th scope="col" class="py-3.5 px-6 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Nama Customer</th>
                        <th scope="col" class="py-3.5 px-6 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Status Progres</th>
                        <th scope="col" class="py-3.5 px-6 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Tanggal Masuk</th>
                    </tr>
                </thead>

                <tbody class="bg-white divide-y divide-gray-100">

                    @php
                    // Pemetaan Badge UI Premium berbasis Ring & Dots khusus Admin
                    $statusColorMap = [
                        'pending' => 'bg-amber-50 text-amber-700 ring-amber-600/20 dot-amber-500',
                        'processing' => 'bg-blue-50 text-blue-700 ring-blue-600/20 dot-blue-500',
                        'completed' => 'bg-emerald-50 text-emerald-700 ring-emerald-600/20 dot-emerald-500',
                        'calibration' => 'bg-rose-50 text-rose-700 ring-rose-600/20 dot-rose-500',
                        'waiting certificate' => 'bg-purple-50 text-purple-700 ring-purple-600/20 dot-purple-500',
                    ];

                    $dotColorMap = [
                        'pending' => 'bg-amber-500',
                        'processing' => 'bg-blue-500',
                        'completed' => 'bg-emerald-500',
                        'calibration' => 'bg-rose-500',
                        'waiting certificate' => 'bg-purple-500',
                    ];
                    @endphp

                    @forelse ($recentOrders as $order)
                    <tr class="hover:bg-gray-50/70 transition-all duration-150">
                        <td class="py-4 px-6 font-semibold text-gray-900 whitespace-nowrap">#{{ $order->id }}</td>

                        <td class="py-4 px-6 text-gray-700 font-medium whitespace-nowrap">
                            {{ $order->customer_name }}
                        </td>

                        <td class="py-4 px-6 whitespace-nowrap">
                            @php 
                                $statusKey = strtolower($order->status); 
                                $badgeStyle = $statusColorMap[$statusKey] ?? 'bg-gray-50 text-gray-600 ring-gray-500/10';
                                $dotStyle = $dotColorMap[$statusKey] ?? 'bg-gray-400';
                            @endphp
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold ring-1 ring-inset {{ $badgeStyle }}">
                                <span class="w-1.5 h-1.5 rounded-full mr-1.5 {{ $dotStyle }}"></span>
                                {{ ucfirst($order->status) }}
                            </span>
                        </td>

                        <td class="py-4 px-6 text-gray-500 whitespace-nowrap">
                            <div class="flex items-center gap-1.5">
                                <i class="bi bi-calendar3 text-gray-400 text-xs"></i>
                                {{ $order->created_at->format('d M Y') }}
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-12 text-center text-gray-400">
                            <i class="bi bi-inbox text-4xl block mb-2 text-gray-300"></i>
                            <p class="text-base font-medium text-gray-500">Belum ada data order</p>
                            <p class="text-xs text-gray-400 mt-0.5">Seluruh pesanan baru akan ditampilkan otomatis di sini.</p>
                        </td>
                    </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection