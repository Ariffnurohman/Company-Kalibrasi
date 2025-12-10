@extends('layouts.technician')

@section('content')
<div class="bg-white p-6 rounded-lg shadow">

    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-semibold">Daftar Order</h2>
    </div>

    <div class="overflow-x-auto mt-4">
        <table class="w-full border border-gray-300 rounded-lg">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 border">No</th>
                    <th class="px-4 py-2 border">Order Number</th>
                    <th class="px-4 py-2 border">Customer</th>
                    <th class="px-4 py-2 border">Status</th>
                    <th class="px-4 py-2 border">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($orders as $index => $order)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2 border">{{ $index + 1 }}</td>
                    <td class="px-4 py-2 border">{{ $order->order_number }}</td>
                    <td class="px-4 py-2 border">{{ $order->customer_name }}</td>
                    <td class="px-4 py-2 border">
                        <span class="
                            px-3 py-1 rounded-full text-white text-sm
                            {{ $order->status == 'pending' ? 'bg-yellow-500' : '' }}
                            {{ $order->status == 'proses' ? 'bg-blue-500' : '' }}
                            {{ $order->status == 'selesai' ? 'bg-green-600' : '' }}
                        ">
                            {{ ucfirst($order->status) }}
                        </span>
                    </td>

                    <td class="px-4 py-2 border">
                        <a href="{{ route('technician.orders.show', $order->id) }}"
                           class="px-3 py-1 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                           Detail
                        </a>
                    </td>
                </tr>

                @empty
                <tr>
                    <td colspan="5" class="text-center py-4 text-gray-500">
                        Tidak ada data order.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
