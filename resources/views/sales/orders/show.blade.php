@extends('layouts.sales')

@section('content')
<div class="max-w-3xl mx-auto p-6">

    <h1 class="text-2xl font-bold mb-4">Detail Order</h1>

    <div class="bg-white p-6 rounded-lg shadow">

        <p><strong>Order Number:</strong> {{ $order->order_number }}</p>
        <p><strong>Tanggal Order:</strong> {{ $order->created_at->format('d M Y') }}</p>
        <p><strong>Nama Alat:</strong> {{ $order->tool_name ?? '-' }}</p>
        <p><strong>Status:</strong> 
            <span class="px-3 py-1 rounded text-sm
                @if($order->status == 'Pending') bg-yellow-200 text-yellow-800 
                @elseif($order->status == 'Process') bg-blue-200 text-blue-800
                @else bg-green-200 text-green-800
                @endif">
                {{ $order->status }}
            </span>
        </p>

        <hr class="my-4">

        <a href="{{ route('sales.orders.index') }}"
            class="inline-block bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-800">
            Kembali
        </a>
    </div>

</div>
@endsection
