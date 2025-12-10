@extends('layouts.sales')

@section('content')
<div class="max-w-5xl mx-auto p-6">

    <h1 class="text-2xl font-bold mb-4">Daftar Order Saya</h1>

    <!-- Filter -->
    <form method="GET" class="mb-4">
        <select name="status"
            class="border rounded p-2"
            onchange="this.form.submit()">
            <option value="all">Semua Status</option>
            <option value="Pending" {{ request('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
            <option value="Process" {{ request('status') == 'Process' ? 'selected' : '' }}>Process</option>
            <option value="Selesai" {{ request('status') == 'Selesai' ? 'selected' : '' }}>Selesai</option>
        </select>
    </form>

    <div class="bg-white shadow rounded-lg">
        <table class="min-w-full text-left">
            <thead>
                <tr class="border-b">
                    <th class="p-3">Order #</th>
                    <th class="p-3">Nama Alat</th>
                    <th class="p-3">Status</th>
                    <th class="p-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($orders as $order)
                <tr class="border-b">
                    <td class="p-3">{{ $order->order_number }}</td>
                    <td class="p-3">{{ $order->tool_name ?? '-' }}</td>
                    <td class="p-3">
                        <span class="px-3 py-1 rounded text-sm
                            @if($order->status == 'Pending') bg-yellow-200 text-yellow-800 
                            @elseif($order->status == 'Process') bg-blue-200 text-blue-800
                            @else bg-green-200 text-green-800
                            @endif">
                            {{ $order->status }}
                        </span>
                    </td>
                    <td class="p-3">
                        <a 
                            href="{{ route('sales.orders.show', $order->id) }}"
                            class="text-blue-600 hover:underline">
                            Detail
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="p-3 text-center text-gray-500">
                        Tidak ada order
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection
