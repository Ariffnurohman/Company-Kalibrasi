@extends('layouts.technician')

@section('content')

{{-- Statistik Section --}}
<div class="grid grid-cols-1 md:grid-cols-3 gap-4">

    <div class="bg-white p-5 rounded-xl shadow-sm border">
        <p class="text-gray-500 text-sm">Assigned Orders</p>
        <p class="text-3xl font-bold mt-1">{{ $assignedOrders }}</p>
    </div>

    <div class="bg-white p-5 rounded-xl shadow-sm border">
        <p class="text-gray-500 text-sm">In Progress</p>
        <p class="text-3xl font-bold text-blue-600 mt-1">{{ $inProgress }}</p>
    </div>

    <div class="bg-white p-5 rounded-xl shadow-sm border">
        <p class="text-gray-500 text-sm">Completed</p>
        <p class="text-3xl font-bold text-green-600 mt-1">{{ $completed }}</p>
    </div>

</div>


{{-- Recent Orders Section --}}
<div class="bg-white rounded-xl shadow-sm border mt-6">

    <div class="p-4 border-b flex items-center justify-between">
        <h2 class="text-lg font-semibold">Recent Orders</h2>

        {{-- Search Filter --}}
        <form method="GET" class="w-52">
            <input 
                type="text" 
                name="search" 
                value="{{ request('search') }}"
                placeholder="Search orders..."
                class="w-full px-3 py-2 border rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none"
            >
        </form>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full text-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 text-left">Order</th>
                    <th class="px-4 py-2 text-left">Instrument</th>
                    <th class="px-4 py-2 text-left">Status</th>
                    <th class="px-4 py-2 text-left">Updated</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($recentOrders as $o)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-4 py-2 font-medium">{{ $o->order_number }}</td>
                    <td class="px-4 py-2">{{ $o->instrument }}</td>
                    <td class="px-4 py-2">
                        @php
                            $color = match($o->status) {
                                'Completed' => 'bg-green-100 text-green-700',
                                'Calibration' => 'bg-yellow-100 text-yellow-700',
                                'Processing' => 'bg-blue-100 text-blue-700',
                                default => 'bg-gray-100 text-gray-700',
                            };
                        @endphp

                        <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $color }}">
                            {{ $o->status }}
                        </span>
                    </td>
                    <td class="px-4 py-2">{{ $o->updated_at->diffForHumans() }}</td>
                </tr>

                @empty
                <tr>
                    <td colspan="4" class="px-4 py-5 text-center text-gray-500">No orders found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>

@endsection
