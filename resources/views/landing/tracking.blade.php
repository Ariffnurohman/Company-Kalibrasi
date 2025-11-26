@extends('layouts.tracking')

@section('content')
<div class="min-h-screen bg-gray-100 py-12">

    <div class="max-w-2xl mx-auto bg-white p-10 rounded-2xl shadow-xl border">

        <!-- Title -->
        <h1 class="text-4xl font-extrabold text-center text-gray-800 mb-10 flex items-center justify-center gap-3">
            <span class="text-3xl">🔍</span> Tracking Order
        </h1>

        <!-- Info Grid -->
        <div class="grid grid-cols-1 gap-6">

            <div>
                <p class="text-sm text-gray-500">Nomor Order</p>
                <p class="text-xl font-bold text-gray-900">{{ $order->order_number }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Nama PT</p>
                <p class="text-xl font-bold text-gray-900">{{ $order->customer_name }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Nama Alat</p>
                <p class="text-xl font-bold text-gray-900">{{ $order->instrument }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Status Saat Ini</p>

                <span class="inline-block mt-1 px-4 py-2 text-lg font-semibold rounded-lg
                    @if($order->status == 'Pending')
                        bg-yellow-100 text-yellow-700
                    @elseif($order->status == 'Processing')
                        bg-blue-100 text-blue-700
                    @elseif($order->status == 'Completed')
                        bg-green-100 text-green-700
                    @else
                        bg-gray-100 text-gray-700
                    @endif
                ">
                    {{ $order->status }}
                </span>
            </div>

        </div>

        <!-- Separator -->
        <div class="border-t my-10"></div>

        <!-- Timeline Title -->
        <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center gap-2">
            ⏱ Timeline Proses
        </h2>

        <!-- Timeline -->
        <div class="relative border-l-2 border-gray-300 ml-4 space-y-10">

            <!-- Diterima -->
            <div class="relative pl-8">
                <div class="w-4 h-4 bg-blue-600 rounded-full absolute -left-2 top-1"></div>
                <p class="text-lg font-semibold">Diterima</p>
                <p class="text-gray-600">
                    {{ $order->received_date ?? '—' }}
                </p>
            </div>

            <!-- Proses -->
            <div class="relative pl-8">
                <div class="w-4 h-4 bg-yellow-500 rounded-full absolute -left-2 top-1"></div>
                <p class="text-lg font-semibold">Proses Kalibrasi</p>
                <p class="text-gray-600">
                    {{ $order->processing_date ?? '— Belum diproses' }}
                </p>
            </div>

            <!-- Selesai -->
            <div class="relative pl-8 pb-2">
                <div class="w-4 h-4 bg-green-600 rounded-full absolute -left-2 top-1"></div>
                <p class="text-lg font-semibold">Selesai</p>
                <p class="text-gray-600">
                    {{ $order->completed_date ?? '— Belum selesai' }}
                </p>
            </div>

        </div>

    </div>

</div>

@endsection
