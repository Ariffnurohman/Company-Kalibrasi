@extends('layouts.admin')

@section('content')
<div class="max-w-5xl mx-auto">
    
    {{-- BREADCRUMB / TITLE --}}
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-900 tracking-tight">Buat Order Baru</h2>
        <p class="text-sm text-gray-500 mt-1">Silakan isi formulir di bawah ini untuk meregistrasikan order kalibrasi instrumen baru secara manual.</p>
    </div>

    {{-- KONTEN UTAMA FORM --}}
    <form action="{{ route('admin.orders.store') }}" method="POST" class="space-y-6 bg-white border border-gray-200 rounded-2xl p-6 sm:p-8 shadow-sm">
        @csrf

        {{-- BARIS 1: NAMA CUSTOMER & NAMA ALAT --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="form-control w-full">
                <label class="label pt-0 pb-1.5">
                    <span class="text-xs font-bold text-gray-700 uppercase tracking-wider">Nama Customer</span>
                </label>
                <input type="text" name="customer_name" placeholder="Contoh: PT. Maju Bersama" required
                    class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-600 focus:outline-none transition-all shadow-sm" />
            </div>

            <div class="form-control w-full">
                <label class="label pt-0 pb-1.5">
                    <span class="text-xs font-bold text-gray-700 uppercase tracking-wider">Nama Instrumen / Alat</span>
                </label>
                <input type="text" name="instrument" placeholder="Contoh: Digital Thermometer Fluke" required
                    class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-600 focus:outline-none transition-all shadow-sm" />
            </div>
        </div>

        {{-- BARIS 2: STATUS, TANGGAL PENERIMAAN, & PILIHAN TEKNISI --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            {{-- Status --}}
            <div class="form-control w-full">
                <label class="label pt-0 pb-1.5">
                    <span class="text-xs font-bold text-gray-700 uppercase tracking-wider">Status Awal</span>
                </label>
                <select name="status" required class="w-full px-4 py-2.5 text-sm bg-white border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-600 focus:outline-none transition-all shadow-sm appearance-none">
                    <option value="">-- Pilih Status --</option>
                    <option value="Pending">Pending</option>
                    <option value="Processing">Processing</option>
                    <option value="Calibration">Calibration</option>
                    <option value="Waiting Certificate">Waiting Certificate</option>
                    <option value="Completed">Completed</option>
                </select>
            </div>

            {{-- Tanggal Diterima --}}
            <div class="form-control w-full">
                <label class="label pt-0 pb-1.5">
                    <span class="text-xs font-bold text-gray-700 uppercase tracking-wider">Tanggal Diterima</span>
                </label>
                <input type="date" name="received_date" value="{{ date('Y-m-d') }}"
                    class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-600 focus:outline-none transition-all shadow-sm" />
            </div>

            {{-- Pemilihan Teknisi --}}
            <div class="form-control w-full">
                <label class="label pt-0 pb-1.5">
                    <span class="text-xs font-bold text-gray-700 uppercase tracking-wider">Teknisi Penanggung Jawab</span>
                </label>
                <select name="technician_id" class="w-full px-4 py-2.5 text-sm bg-white border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-600 focus:outline-none transition-all shadow-sm appearance-none">
                    <option value="">-- Belum Ditugaskan --</option>
                    @foreach ($technicians as $tech)
                        <option value="{{ $tech->id }}">
                            {{ $tech->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        {{-- BARIS 3: CATATAN TAMBAHAN --}}
        <div class="form-control w-full">
            <label class="label pt-0 pb-1.5">
                <span class="text-xs font-bold text-gray-700 uppercase tracking-wider">Catatan Tambahan <span class="text-gray-400 font-normal">(Opsional)</span></span>
            </label>
            <textarea name="notes" rows="4" placeholder="Tulis instruksi khusus atau kondisi fisik alat saat diterima..." class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-600 focus:outline-none transition-all shadow-sm resize-none"></textarea>
        </div>

        {{-- TOMBOL SUBMIT / BATAL --}}
        <div class="flex items-center justify-end gap-3 pt-4 border-t border-gray-100">
            <a href="{{ route('admin.orders.index') }}" class="px-4 py-2 text-sm font-semibold text-gray-600 hover:text-gray-900 transition-colors">
                Batal
            </a>
            <button type="submit" class="px-5 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold text-sm rounded-xl shadow-md shadow-indigo-600/10 transition-all">
                Simpan Transaksi
            </button>
        </div>
    </form>
</div>
@endsection