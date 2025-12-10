@extends('layouts.sales')

@section('title', 'Dashboard Sales')

@section('content')
<div class="max-w-6xl mx-auto py-6">

    {{-- Greeting --}}
    <h3 class="text-2xl font-bold mb-6">
        Halo, {{ auth()->user()->name }}
    </h3>

    {{-- STAT CARDS --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

        {{-- Total Pickup --}}
        <div class="bg-white shadow rounded-xl p-5 flex items-center gap-4">
            <div class="bg-blue-100 text-blue-600 p-3 rounded-full">
                <x-heroicon-o-truck class="w-7 h-7" />
            </div>
            <div>
                <h6 class="text-gray-500 text-sm">Total Pickup</h6>
                <p class="text-3xl font-bold text-blue-600 mt-1">{{ $totalPickups }}</p>
            </div>
        </div>

        {{-- Pending --}}
        <div class="bg-white shadow rounded-xl p-5 flex items-center gap-4">
            <div class="bg-yellow-100 text-yellow-500 p-3 rounded-full">
                <x-heroicon-o-clock class="w-7 h-7" />
            </div>
            <div>
                <h6 class="text-gray-500 text-sm">Pending</h6>
                <p class="text-3xl font-bold text-yellow-500 mt-1">{{ $pendingPickups }}</p>
            </div>
        </div>

        {{-- Completed --}}
        <div class="bg-white shadow rounded-xl p-5 flex items-center gap-4">
            <div class="bg-green-100 text-green-600 p-3 rounded-full">
                <x-heroicon-o-check-circle class="w-7 h-7" />
            </div>
            <div>
                <h6 class="text-gray-500 text-sm">Completed</h6>
                <p class="text-3xl font-bold text-green-600 mt-1">{{ $completedPickups }}</p>
            </div>
        </div>

    </div>

    {{-- RECENT PICKUPS --}}
    <div class="bg-white shadow rounded-xl mt-8">
        <div class="border-b px-6 py-4">
            <h5 class="text-lg font-bold">Riwayat Pickup Terbaru</h5>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full text-sm">
                <thead>
                    <tr class="bg-gray-100 text-gray-700 uppercase text-xs">
                        <th class="py-3 px-4 text-left">Order</th>
                        <th class="py-3 px-4 text-left">Tanggal Pickup</th>
                        <th class="py-3 px-4 text-left">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    @forelse ($recentPickups as $p)
                        <tr class="hover:bg-gray-50">
                            <td class="py-3 px-4">
                                {{ $p->order->order_number ?? '-' }}
                            </td>

                            <td class="py-3 px-4">
                                {{ $p->pickup_date ?? '-' }}
                            </td>

                            {{-- Status + Icon --}}
                            <td class="py-3 px-4">
                                @php
                                    $color = [
                                        'pending'   => 'bg-yellow-200 text-yellow-800',
                                        'completed' => 'bg-green-200 text-green-800',
                                        'default'   => 'bg-gray-300 text-gray-800'
                                    ][$p->status] ?? 'bg-gray-300 text-gray-800';

                                    $icon = match($p->status) {
                                        'pending'   => 'clock',
                                        'completed' => 'check-circle',
                                        default     => 'minus-circle'
                                    };
                                @endphp

                                <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-semibold {{ $color }}">
                                    <x-dynamic-component 
                                        :component="'heroicon-o-' . $icon" 
                                        class="w-4 h-4" 
                                    />
                                    {{ ucfirst($p->status ?? '-') }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center text-gray-500 py-6">
                                Belum ada riwayat pickup.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
