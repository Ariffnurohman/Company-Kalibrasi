@extends('layouts.admin')

@section('content')
<div class="max-w-6xl mx-auto">

    <div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h3 class="text-2xl font-bold text-gray-900 tracking-tight">Detail Informasi Transaksi</h3>
            <p class="text-sm text-gray-500 mt-1">Detail pengerjaan instrumen untuk kode pelacakan unik <span class="font-mono text-indigo-600 font-semibold">#{{ $order->order_number }}</span></p>
        </div>
        <a href="{{ route('admin.orders.index') }}" class="inline-flex items-center gap-1.5 px-3.5 py-2 border border-gray-200 rounded-xl text-xs font-semibold text-gray-600 bg-white hover:bg-gray-50 shadow-sm transition-all self-start sm:self-center">
            <i class="bi bi-arrow-left"></i> Kembali ke List
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <div class="lg:col-span-2 space-y-6">
            
            {{-- Kartu Info Utama Ringkas --}}
            <div class="bg-white border border-gray-200 shadow-sm rounded-2xl p-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div>
                    <h4 class="text-xl font-bold text-gray-900">{{ $order->customer_name }}</h4>
                    <p class="text-sm text-gray-500 mt-0.5">Nama Alat: <span class="font-semibold text-gray-700">{{ $order->instrument }}</span></p>
                </div>
                
                @php
                    $status = strtolower($order->status ?? 'Unknown');
                    $badgeStyle = match($status) {
                        'pending' => 'bg-amber-50 text-amber-700 ring-amber-600/20',
                        'processing' => 'bg-blue-50 text-blue-700 ring-blue-600/20',
                        'calibration' => 'bg-rose-50 text-rose-700 ring-rose-600/20',
                        'waiting certificate' => 'bg-purple-50 text-purple-700 ring-purple-600/20',
                        'completed' => 'bg-emerald-50 text-emerald-700 ring-emerald-600/20',
                        default => 'bg-gray-50 text-gray-600 ring-gray-500/10',
                    };
                @endphp
                <span class="inline-flex items-center self-start sm:self-center px-3 py-1.5 rounded-full text-xs font-bold ring-1 ring-inset {{ $badgeStyle }} uppercase tracking-wider">
                    {{ $order->status ?? 'Unknown' }}
                </span>
            </div>

            {{-- Kartu Spesifikasi Informasi Detail --}}
            <div class="bg-white border border-gray-200 shadow-sm rounded-2xl p-6">
                <h5 class="text-sm font-bold text-gray-900 uppercase tracking-wider border-b border-gray-100 pb-3 mb-4">Parameter Spesifik Logistik</h5>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-y-4 gap-x-6 text-sm">
                    <div>
                        <p class="text-gray-400 text-xs font-semibold uppercase tracking-wider">Nomor Order Pelacakan</p>
                        <p class="font-mono text-gray-900 font-semibold mt-0.5">{{ $order->order_number }}</p>
                    </div>
                    <div>
                        <p class="text-gray-400 text-xs font-semibold uppercase tracking-wider">Teknisi Penanggung Jawab</p>
                        <p class="text-gray-900 font-medium mt-0.5">
                            <i class="bi bi-person-workspace text-gray-400 mr-1"></i>
                            {{ $order->technician->name ?? 'Belum ada teknisi ditugaskan' }}
                        </p>
                    </div>
                    <div>
                        <p class="text-gray-400 text-xs font-semibold uppercase tracking-wider">Tanggal Masuk Lab</p>
                        <p class="text-gray-900 font-medium mt-0.5">{{ $order->received_date }}</p>
                    </div>
                    <div>
                        <p class="text-gray-400 text-xs font-semibold uppercase tracking-wider">Tanggal Estimasi Selesai</p>
                        <p class="text-gray-900 font-medium mt-0.5">{{ $order->completed_date ?? '-' }}</p>
                    </div>
                </div>

                {{-- Catatan Opsional --}}
                <div class="mt-6 pt-5 border-t border-gray-100">
                    <p class="text-gray-400 text-xs font-semibold uppercase tracking-wider mb-1.5">Catatan/Kondisi Alat</p>
                    <div class="bg-gray-50 text-gray-700 text-sm p-3.5 rounded-xl border border-gray-200 leading-relaxed">
                        {{ $order->notes ?? 'Tidak ada catatan tambahan untuk instrumen ini.' }}
                    </div>
                </div>
            </div>

        </div>

        <div class="space-y-6">
            
            {{-- Panel Manajemen Aksi Form --}}
            <div class="bg-white border border-gray-200 shadow-sm rounded-2xl p-5">
                <h5 class="text-sm font-bold text-gray-900 uppercase tracking-wider mb-4">Aksi Manajemen</h5>
                
                <a href="{{ route('admin.orders.edit', $order->id) }}"
                   class="w-full inline-flex items-center justify-center gap-2 mb-3 px-4 py-2.5 rounded-xl bg-indigo-600 hover:bg-indigo-700 text-white font-semibold text-sm shadow-md shadow-indigo-600/10 transition-all">
                    <i class="bi bi-pencil-square"></i> Edit Order Ini
                </a>

                <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus transaksi order ini secara permanen?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-xl border border-red-200 text-red-600 hover:bg-red-50 text-sm font-medium transition-all">
                        <i class="bi bi-trash3"></i> Hapus Permanen
                    </button>
                </form>
            </div>

            @if($order->qr_code)
                <div class="bg-white border border-gray-200 shadow-sm rounded-2xl p-6 text-center">
                    <h5 class="text-sm font-bold text-gray-900 uppercase tracking-wider mb-4">QR Code Tracking</h5>

                    <div class="bg-gray-50 p-4 border border-gray-100 rounded-xl inline-block shadow-inner mb-3">
                        <img src="data:image/svg+xml;base64,{{ $order->qr_code }}" class="w-40 h-40 mx-auto" alt="Tracking QR Code"/>
                    </div>

                    <p class="text-xs text-gray-400 mb-4 px-2 leading-relaxed">Scan kode di atas menggunakan ponsel pintar untuk melacak progres kalibrasi secara instan.</p>

                    <a href="{{ url('/tracking/' . $order->order_number) }}" target="_blank"
                       class="inline-flex items-center justify-center gap-2 px-4 py-2 border border-gray-200 rounded-xl text-xs font-semibold text-gray-700 bg-white hover:bg-gray-50 shadow-sm transition-all w-full">
                       <i class="bi bi-box-arrow-up-right text-gray-400"></i> Buka Halaman Pelacakan
                    </a>
                </div>
            @endif

        </div>

    </div>
</div>
@endsection