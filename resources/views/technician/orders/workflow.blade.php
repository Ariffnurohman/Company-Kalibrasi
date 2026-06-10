@extends('layouts.technician')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">

    <div>
        <a href="{{ route('technician.orders.show', $order->id) }}" 
            class="inline-flex items-center gap-1.5 px-4 py-2 bg-white hover:bg-gray-50 text-gray-700 border border-gray-200 rounded-xl text-xs font-bold shadow-sm transition-all">
            <i class="bi bi-arrow-left"></i> Kembali ke Detail Manifes
        </a>
    </div>

    <div class="bg-white shadow-sm border border-gray-200 rounded-2xl overflow-hidden">
        
        <div class="px-6 py-4.5 bg-slate-900 text-white flex justify-between items-center">
            <div>
                <h3 class="text-sm font-bold tracking-wide">
                    Workflow & Lembar Kerja Kalibrasi
                </h3>
                <p class="text-[11px] text-slate-400 mt-0.5 font-mono">ID Order: #{{ $order->order_number }}</p>
            </div>
            <i class="bi bi-file-earmark-check text-xl text-slate-400"></i>
        </div>

        <div class="p-6 space-y-6">

            <div class="p-4 border border-gray-200 bg-slate-50 rounded-xl text-sm grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="text-[10px] font-bold text-gray-400 uppercase tracking-wider block">Identitas Nama Alat:</label>
                    <span class="font-semibold text-gray-800 block mt-0.5">{{ $order->instrument }}</span>
                </div>
                <div>
                    <label class="text-[10px] font-bold text-gray-400 uppercase tracking-wider block">Status Aktual:</label>
                    <span class="font-semibold text-gray-800 block mt-0.5 flex items-center gap-1">
                        <span class="w-2 h-2 rounded-full bg-blue-500"></span> {{ $order->status }}
                    </span>
                </div>
            </div>

            <form action="{{ route('technician.orders.saveWorkflow', $order->id) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                @csrf

                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-gray-600 uppercase tracking-wider">
                        Catatan Teknis / Log Perubahan <span class="text-gray-400 font-normal">(Opsional)</span>
                    </label>
                    <textarea 
                        name="progress" 
                        rows="4" 
                        placeholder="Tuliskan detail poin kalibrasi atau temuan kondisi alat di sini..." 
                        class="w-full border border-gray-300 rounded-xl p-3 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-600 shadow-sm font-medium placeholder:font-normal placeholder:text-gray-400">{{ old('progress', $order->workflow_notes) }}</textarea>
                </div>

                <div class="space-y-2">
                    <label class="block text-xs font-bold text-gray-600 uppercase tracking-wider">
                        Unggah Dokumen Sertifikat / Data Mentah <span class="text-gray-400 font-normal">(Opsional)</span>
                    </label>

                    <div class="border-2 border-dashed border-gray-200 rounded-xl p-4 bg-slate-50/50 flex flex-col items-center justify-center text-center transition-all hover:border-gray-300">
                        <i class="bi bi-cloud-arrow-up text-2xl text-gray-400 mb-2"></i>
                        <input 
                            type="file" 
                            name="file" 
                            class="w-full max-w-xs text-xs text-gray-500 file:mr-4 file:py-1.5 file:px-3 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-blue-50 file:text-blue-600 hover:file:bg-blue-100 transition-all cursor-pointer">
                        <p class="text-[11px] text-gray-400 mt-2">
                            Format yang diizinkan sistem: <span class="font-semibold text-gray-500">PDF, JPG, JPEG, PNG</span> — Ukuran Maksimal 2MB
                        </p>
                    </div>
                </div>

                @if ($order->workflow_file)
                <div class="p-4 border border-blue-100 bg-blue-50/30 rounded-xl text-sm flex items-center justify-between gap-4">
                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 bg-blue-100 text-blue-600 rounded-lg flex items-center justify-center text-lg">
                            <i class="bi bi-file-earmark-pdf"></i>
                        </div>
                        <div>
                            <span class="font-bold text-gray-800 block text-xs">Arsip Berkas Tersimpan</span>
                            <span class="text-[11px] text-gray-400 block mt-0.5">Dokumen kalibrasi aktif saat ini</span>
                        </div>
                    </div>

                    <a href="{{ asset('storage/' . $order->workflow_file) }}" 
                        target="_blank"
                        class="inline-flex items-center gap-1 px-3 py-1.5 bg-white hover:bg-gray-50 border border-gray-200 text-blue-600 rounded-lg font-bold text-xs shadow-sm transition-all">
                        <i class="bi bi-eye"></i> Tinjau File Lama
                    </a>
                </div>
                @endif

                <div class="border-t border-gray-100 pt-4">
                    <button type="submit" 
                        class="w-full py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs rounded-xl transition-all shadow-md shadow-blue-600/10 flex items-center justify-center gap-1.5">
                        <i class="bi bi-hdd"></i> Simpan & Perbarui Dokumen Kalibrasi
                    </button>
                </div>
            </form>

        </div>
    </div>

</div>
@endsection