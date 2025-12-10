@extends('layouts.technician')

@section('content')

<div class="max-w-3xl mx-auto py-5">

    {{-- Tombol Kembali --}}
    <a href="{{ route('technician.orders.show', $order->id) }}" 
        class="inline-block mb-4 px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">
        ← Kembali ke Detail Order
    </a>

    {{-- CARD --}}
    <div class="bg-white shadow-md rounded-xl overflow-hidden">

        {{-- HEADER --}}
        <div class="px-6 py-4 bg-blue-600 text-white">
            <h3 class="text-lg font-semibold">
                Workflow Kalibrasi — {{ $order->order_number }}
            </h3>
        </div>

        <div class="p-6">

            {{-- STATUS ORDER --}}
            <div class="mb-5 p-4 border rounded-lg bg-gray-50">
                <h4 class="text-md font-semibold text-gray-700 mb-2">Status Pengerjaan</h4>

                <p class="text-gray-600">
                    Nama Alat:  
                    <span class="font-semibold text-gray-800">{{ $order->instrument }}</span>
                </p>

                <p class="mt-1 text-gray-600">
                    Status Saat Ini:  
                    <span class="
                        inline-block px-3 py-1 text-xs font-bold rounded-full 
                        @if($order->status=='Completed') bg-green-100 text-green-700
                        @elseif($order->status=='Calibration') bg-yellow-100 text-yellow-700
                        @elseif($order->status=='Processing') bg-blue-100 text-blue-700
                        @else bg-gray-200 text-gray-700
                        @endif
                    ">
                        {{ ucfirst($order->status) }}
                    </span>
                </p>
            </div>

            {{-- FORM --}}
            <form action="{{ route('technician.orders.workflow.store', $order->id) }}" 
                method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Progress --}}
                <div class="mb-4">
                    <label class="block font-semibold text-gray-700 mb-1">
                        Progress / Catatan Kalibrasi
                    </label>
                    <textarea 
                        name="progress" 
                        rows="5" 
                        class="w-full border border-gray-300 rounded-lg p-3 text-gray-700 focus:ring-2 focus:ring-blue-400"
                        placeholder="Tulis catatan pengerjaan teknisi..."
                    >{{ old('progress', $order->workflow_notes) }}</textarea>
                </div>

                {{-- File Upload --}}
                <div class="mb-4">
                    <label class="block font-semibold text-gray-700 mb-1">Upload File (Opsional)</label>

                    <input 
                        type="file" 
                        name="file" 
                        class="w-full border border-gray-300 rounded-lg p-2 bg-white text-gray-700 focus:ring-2 focus:ring-blue-300">

                    <p class="text-xs text-gray-500 mt-1">
                        Format diizinkan: PDF, JPG, PNG — Max 2MB
                    </p>
                </div>

                {{-- File sebelumnya --}}
                @if ($order->workflow_file)
                <div class="mb-4">
                    <label class="block font-semibold text-gray-700 mb-1">File Sebelumnya:</label>

                    <a href="{{ asset('storage/' . $order->workflow_file) }}" 
                        target="_blank"
                        class="inline-block px-4 py-2 border border-blue-500 text-blue-600 rounded-lg hover:bg-blue-50 transition text-sm">
                        Lihat File Lama
                    </a>
                </div>
                @endif

                {{-- Submit --}}
                <button class="w-full bg-blue-600 text-white py-2 rounded-lg text-md hover:bg-blue-700 transition">
                    Simpan Workflow
                </button>

            </form>

        </div>
    </div>
</div>

@endsection
