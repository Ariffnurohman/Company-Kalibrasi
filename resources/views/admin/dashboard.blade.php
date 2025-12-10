@extends('layouts.admin')

@section('content')
<div class="max-w-7xl mx-auto py-6">

    {{-- PAGE TITLE --}}
    <h3 class="text-2xl font-bold mb-6">Admin Dashboard</h3>


    {{-- ================= SUMMARY CARDS ================= --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-5">

        {{-- Total Orders --}}
        <div class="relative bg-indigo-600 text-white p-6 rounded-2xl shadow">
            <h6 class="text-sm opacity-90">Total Orders</h6>
            <h2 class="text-4xl font-bold mt-1">{{ $totalOrders }}</h2>

            <div class="absolute right-4 bottom-4 opacity-40">
                <x-heroicon-o-clipboard-document-check class="w-12 h-12" />
            </div>
        </div>

        {{-- Completed Orders --}}
        <div class="relative bg-cyan-500 text-white p-6 rounded-2xl shadow">
            <h6 class="text-sm opacity-90">Completed Orders</h6>
            <h2 class="text-4xl font-bold mt-1">{{ $completedOrders }}</h2>

            <div class="absolute right-4 bottom-4 opacity-40">
                <x-heroicon-o-check-circle class="w-12 h-12" />
            </div>
        </div>

        {{-- Pending Orders --}}
        <div class="relative bg-yellow-500 text-white p-6 rounded-2xl shadow">
            <h6 class="text-sm opacity-90">Pending Orders</h6>
            <h2 class="text-4xl font-bold mt-1">{{ $pendingOrders }}</h2>

            <div class="absolute right-4 bottom-4 opacity-40">
                <x-heroicon-o-clock class="w-12 h-12" />
            </div>
        </div>

    </div>


    {{-- ================= RECENT ORDERS TABLE ================= --}}
    <div class="bg-white shadow rounded-2xl p-6 mt-8">
        <h6 class="text-lg font-bold mb-4">Recent Orders</h6>

        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-gray-100 text-gray-600 text-left text-xs uppercase">
                        <th class="py-3 px-4">#</th>
                        <th class="py-3 px-4">Customer</th>
                        <th class="py-3 px-4">Status</th>
                        <th class="py-3 px-4">Date</th>
                    </tr>
                </thead>

                <tbody class="divide-y">

                    @php
                        $statusColor = [
                            'pending' => 'bg-yellow-200 text-yellow-800',
                            'processing' => 'bg-blue-200 text-blue-800',
                            'completed' => 'bg-green-200 text-green-800',
                            'calibration' => 'bg-red-200 text-red-800',
                            'waiting certificate' => 'bg-indigo-200 text-indigo-800',
                        ];
                    @endphp

                    @foreach ($recentOrders as $order)
                        <tr class="hover:bg-gray-50">
                            <td class="py-3 px-4">{{ $order->id }}</td>

                            <td class="py-3 px-4">
                                {{ $order->customer_name }}
                            </td>

                            <td class="py-3 px-4">
                                <span class="px-3 py-1 text-xs rounded-full font-semibold 
                                {{ $statusColor[strtolower($order->status)] ?? 'bg-gray-200 text-gray-800' }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>

                            <td class="py-3 px-4">
                                {{ $order->created_at->format('d M Y') }}
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
