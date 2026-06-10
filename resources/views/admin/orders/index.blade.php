@extends('layouts.admin')

@section('content')
<div class="max-w-7xl mx-auto">

    {{-- HEADER HALAMAN --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 tracking-tight">Manajemen Orders</h1>
            <p class="text-sm text-gray-500 mt-1">Kelola, pantau, dan perbarui status pengerjaan kalibrasi instrumen.</p>
        </div>
        <a href="{{ route('admin.orders.create') }}" 
           class="inline-flex items-center justify-center gap-2 px-4 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold text-sm rounded-xl shadow-md shadow-indigo-600/10 transition-all self-start sm:self-center">
            <i class="bi bi-plus-circle text-base"></i>
            <span>Buat Order Manual</span>
        </a>
    </div>

    {{-- BAR FILTER & PENCARIAN --}}
    <div class="bg-white p-4 rounded-2xl shadow-sm border border-gray-200 mb-6 flex flex-wrap items-center justify-between gap-4">
        <div class="flex flex-wrap gap-2">
            <button class="px-3.5 py-1.5 border border-gray-200 rounded-lg text-xs font-semibold text-gray-600 bg-gray-50 hover:bg-gray-100 transition-colors flex items-center gap-1.5">
                Tipe Alat <i class="bi bi-chevron-down text-[10px]"></i>
            </button>
            <button class="px-3.5 py-1.5 border border-gray-200 rounded-lg text-xs font-semibold text-gray-600 bg-gray-50 hover:bg-gray-100 transition-colors flex items-center gap-1.5">
                Status <i class="bi bi-chevron-down text-[10px]"></i>
            </button>
            <button class="px-3.5 py-1.5 border border-gray-200 rounded-lg text-xs font-semibold text-gray-600 bg-gray-50 hover:bg-gray-100 transition-colors flex items-center gap-1.5">
                Tanggal Order <i class="bi bi-chevron-down text-[10px]"></i>
            </button>
        </div>

        <div class="flex items-center gap-2 w-full sm:w-auto">
            <button class="inline-flex items-center justify-center gap-1.5 px-3 py-2 border border-gray-200 rounded-xl text-xs font-medium text-gray-700 hover:bg-gray-50 transition-colors bg-white shadow-sm flex-1 sm:flex-none">
                <i class="bi bi-upload text-gray-400"></i> Import
            </button>
            <button class="inline-flex items-center justify-center gap-1.5 px-3 py-2 border border-gray-200 rounded-xl text-xs font-medium text-gray-700 hover:bg-gray-50 transition-colors bg-white shadow-sm flex-1 sm:flex-none">
                <i class="bi bi-download text-gray-400"></i> Export
            </button>
        </div>
    </div>

    {{-- TABEL DATA ORDERS --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="py-3.5 px-6 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider w-12">No</th>
                        <th scope="col" class="py-3.5 px-6 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">No. Order</th>
                        <th scope="col" class="py-3.5 px-6 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Nama Customer</th>
                        <th scope="col" class="py-3.5 px-6 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Instrumen Alat</th>
                        <th scope="col" class="py-3.5 px-6 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Status Progres</th>
                        <th scope="col" class="py-3.5 px-6 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Tgl Masuk</th>
                        <th scope="col" class="py-3.5 px-6 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Tgl Selesai</th>
                        <th scope="col" class="py-3.5 px-6 text-center text-xs font-semibold text-gray-500 uppercase tracking-wider w-24">Aksi</th>
                    </tr>
                </thead>

                <tbody class="bg-white divide-y divide-gray-100">
                    @php
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

                    @foreach ($orders as $order)
                    <tr class="hover:bg-gray-50/70 transition-all duration-150">
                        <td class="py-4 px-6 text-gray-400 font-medium whitespace-nowrap">{{ $loop->iteration }}</td>
                        <td class="py-4 px-6 font-semibold text-gray-900 whitespace-nowrap">{{ $order->order_number }}</td>
                        <td class="py-4 px-6 text-gray-700 font-medium whitespace-nowrap">{{ $order->customer_name }}</td>
                        <td class="py-4 px-6 text-gray-600 whitespace-nowrap">{{ $order->instrument }}</td>
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
                        <td class="py-4 px-6 text-gray-500 whitespace-nowrap">{{ $order->received_date }}</td>
                        <td class="py-4 px-6 text-gray-500 whitespace-nowrap">{{ $order->completed_date ?? '-' }}</td>
                        <td class="py-4 px-6 whitespace-nowrap text-center">
                            <a href="{{ route('admin.orders.show', $order->id) }}" 
                               class="inline-flex items-center justify-center px-3 py-1.5 text-xs font-semibold border border-gray-200 rounded-lg text-indigo-600 bg-white hover:bg-gray-50 shadow-sm transition-all">
                                Detail
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection