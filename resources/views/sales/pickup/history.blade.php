@extends('layouts.sales')

@section('content')
<div class="max-w-5xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">History Pickup</h1>

    <div class="bg-white shadow rounded-lg">
        <table class="min-w-full text-left">
            <thead>
                <tr class="border-b">
                    <th class="p-3">Order</th>
                    <th class="p-3">Tanggal Pickup</th>
                    <th class="p-3">Status</th>
                    <th class="p-3">Catatan</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pickups as $pickup)
                <tr class="border-b">
                    <td class="p-3">{{ $pickup->order->order_number }}</td>
                    <td class="p-3">{{ $pickup->pickup_date }}</td>
                    <td class="p-3">{{ ucfirst($pickup->status) }}</td>
                    <td class="p-3">{{ $pickup->notes ?? '-' }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="p-3 text-center text-gray-500">
                        Belum ada history pickup.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
