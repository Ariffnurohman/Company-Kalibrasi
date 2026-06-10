@extends('layouts.technician')

@section('content')
<div class="max-w-5xl mx-auto space-y-6">

    <div>
        <a href="{{ route('technician.orders.index') }}" 
            class="inline-flex items-center gap-1.5 px-4 py-2 bg-white hover:bg-gray-50 text-gray-700 border border-gray-200 rounded-xl text-xs font-bold shadow-sm transition-all">
            <i class="bi bi-arrow-left"></i> Kembali ke Daftar Order
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        
        <div class="md:col-span-2 bg-white rounded-2xl border border-gray-200 p-6 shadow-sm space-y-6">
            <div>
                <span class="text-[10px] font-bold tracking-wider text-blue-600 bg-blue-50 border border-blue-100 px-2.5 py-1 rounded-md uppercase">
                    Manifes Kerja Teknisi
                </span>
                <h2 class="text-xl font-bold text-gray-900 mt-3 font-mono">#{{ $order->order_number }}</h2>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 border-t border-gray-100 pt-5 text-sm">
                <div>
                    <label class="text-[11px] font-bold text-gray-400 uppercase tracking-wider block">Nama Customer / Perusahaan</label>
                    <span class="font-bold text-gray-800 block mt-0.5">{{ $order->customer_name }}</span>
                </div>
                <div>
                    <label class="text-[11px] font-bold text-gray-400 uppercase tracking-wider block">Nama Alat / Instrumen</label>
                    <span class="font-semibold text-gray-700 block mt-0.5">{{ $order->instrument }}</span>
                </div>
                <div>
                    <label class="text-[11px] font-bold text-gray-400 uppercase tracking-wider block">Tanggal Masuk Laboratorium</label>
                    <span class="text-gray-600 block mt-0.5 flex items-center gap-1.5">
                        <i class="bi bi-calendar3 text-gray-400"></i> {{ \Carbon\Carbon::parse($order->received_date)->format('d M Y') }}
                    </span>
                </div>
                <div>
                    <label class="text-[11px] font-bold text-gray-400 uppercase tracking-wider block">Status Berjalan Saat Ini</label>
                    @php
                        $statusClass = match(strtolower($order->status)) {
                            'completed' => 'bg-emerald-50 text-emerald-700 border-emerald-200',
                            'waiting certificate' => 'bg-indigo-50 text-indigo-700 border-indigo-200',
                            'calibration' => 'bg-rose-50 text-rose-700 border-rose-200',
                            'processing' => 'bg-blue-50 text-blue-700 border-blue-200',
                            default => 'bg-yellow-50 text-yellow-700 border-yellow-200',
                        };
                    @endphp
                    <span class="inline-flex items-center gap-1 px-2 py-0.5 text-xs font-bold rounded border {{ $statusClass }} mt-1">
                        {{ $order->status }}
                    </span>
                </div>
            </div>

            @if($order->notes)
            <div class="bg-slate-50 border border-gray-200/60 rounded-xl p-4 text-sm">
                <label class="text-[11px] font-bold text-gray-400 uppercase tracking-wider block mb-1">Catatan Tambahan Masuk:</label>
                <p class="text-gray-700 italic">"{{ $order->notes }}"</p>
            </div>
            @endif

            <div class="border-t border-gray-100 pt-5 flex flex-wrap gap-3">
                <a href="{{ route('technician.orders.workflow', $order->id) }}" 
                    class="inline-flex items-center gap-1.5 px-4 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl text-xs font-bold shadow-sm shadow-indigo-600/10 transition-all">
                    <i class="bi bi-file-earmark-medical"></i> Buka Pengaturan Lembar Kerja & Dokumen
                </a>
            </div>
        </div>

        <div class="md:col-span-1 space-y-4">
            <div class="bg-white rounded-2xl border border-gray-200 p-6 shadow-sm">
                <h3 class="text-sm font-bold text-gray-900 mb-4 flex items-center gap-2">
                    <i class="bi bi-arrow-repeat text-blue-600"></i> Pembaruan Status Kerja
                </h3>

                <form action="{{ route('technician.orders.updateStatus', $order->id) }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">
                            Pilih Progres Lab Terbaru
                        </label>
                        <select name="status" required
                            class="w-full border border-gray-300 rounded-xl p-2.5 bg-white text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-600 shadow-sm font-medium">
                            <option value="Pending" {{ $order->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                            <option value="Processing" {{ $order->status == 'Processing' ? 'selected' : '' }}>Processing (Pra-Kondisi)</option>
                            <option value="Calibration" {{ $order->status == 'Calibration' ? 'selected' : '' }}>Calibration (Kalibrasi Unit)</option>
                            <option value="Waiting Certificate" {{ $order->status == 'Waiting Certificate' ? 'selected' : '' }}>Waiting Certificate (Cetak Dokumen)</option>
                            <option value="Completed" {{ $order->status == 'Completed' ? 'selected' : '' }}>Completed (Selesai Penuh)</option>
                        </select>
                    </div>

                    <button type="submit"
                        class="w-full py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-semibold text-xs rounded-xl transition-all shadow-md shadow-blue-600/10 flex items-center justify-center gap-1">
                        <i class="bi bi-check-circle"></i> Terapkan Perubahan
                    </button>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection