@extends('layouts.admin')

@section('content')
<div class="max-w-7xl mx-auto">

    {{-- HEADER EDIT --}}
    <div class="mb-6">
        <h3 class="text-2xl font-bold text-gray-900 tracking-tight">Edit Transaksi Order</h3>
        <p class="text-sm text-gray-500 mt-1">Perbarui informasi dan penugasan teknisi untuk Order <span class="font-semibold text-gray-800">#{{ $order->order_number }}</span></p>
    </div>

    {{-- LAYOUT FORM UTAMA (2 Kolom Kiri, 1 Kolom Kanan Tindakan Cepat) --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        <div class="lg:col-span-2">
            <div class="bg-white border border-gray-200 rounded-2xl shadow-sm p-6 sm:p-8">
                <h4 class="text-sm font-bold text-gray-900 uppercase tracking-wider mb-5 pb-3 border-b border-gray-100">Informasi Instrumen Kalibrasi</h4>

                <form action="{{ route('admin.orders.update', $order->id) }}" method="POST" class="space-y-5">
                    @csrf
                    @method('PUT')

                    <div class="form-control">
                        <label class="label pb-1.5"><span class="text-xs font-bold text-gray-700 uppercase tracking-wider">Nama Customer</span></label>
                        <input type="text" name="customer_name" class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-600 focus:outline-none transition-all shadow-sm" value="{{ $order->customer_name }}" required>
                    </div>

                    <div class="form-control">
                        <label class="label pb-1.5"><span class="text-xs font-bold text-gray-700 uppercase tracking-wider">Instrumen Alat</span></label>
                        <input type="text" name="instrument" class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-600 focus:outline-none transition-all shadow-sm" value="{{ $order->instrument }}" required>
                    </div>

                    {{-- Status Progres & Penugasan Teknisi --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div class="form-control">
                            <label class="label pb-1.5"><span class="text-xs font-bold text-gray-700 uppercase tracking-wider">Status Progres</span></label>
                            <select name="status" class="w-full px-4 py-2.5 text-sm bg-white border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-600 focus:outline-none transition-all shadow-sm appearance-none" required>
                                <option value="Pending" {{ $order->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                <option value="Processing" {{ $order->status == 'Processing' ? 'selected' : '' }}>Processing</option>
                                <option value="Calibration" {{ $order->status == 'Calibration' ? 'selected' : '' }}>Calibration</option>
                                <option value="Waiting Certificate" {{ $order->status == 'Waiting Certificate' ? 'selected' : '' }}>Waiting Certificate</option>
                                <option value="Completed" {{ $order->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                            </select>
                        </div>

                        <div class="form-control">
                            <label class="label pb-1.5"><span class="text-xs font-bold text-gray-700 uppercase tracking-wider">Pilih Teknisi Penanggung Jawab</span></label>
                            <select name="technician_id" class="w-full px-4 py-2.5 text-sm bg-white border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-600 focus:outline-none transition-all shadow-sm appearance-none">
                                <option value="">-- Belum Ditugaskan --</option>
                                @foreach ($technicians as $tech)
                                    <option value="{{ $tech->id }}" {{ $order->technician_id == $tech->id ? 'selected' : '' }}>
                                        {{ $tech->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="pt-4 border-t border-gray-100 flex justify-end">
                        <button class="px-5 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold text-sm rounded-xl shadow-md shadow-indigo-600/10 transition-all flex items-center gap-1.5">
                            <i class="bi bi-save"></i> Perbarui Data Order
                        </button>
                    </div>

                </form>
            </div>
        </div>

        <div class="space-y-4">
            <div class="bg-white border border-gray-200 rounded-2xl shadow-sm p-5">
                <h5 class="text-sm font-bold text-gray-900 uppercase tracking-wider mb-4">Tindakan Cepat</h5>
                
                <div class="space-y-2">
                    <a href="{{ route('admin.orders.show', $order->id) }}" 
                       class="w-full inline-flex items-center justify-center gap-2 px-4 py-2.5 border border-gray-200 rounded-xl text-sm font-medium text-gray-700 hover:bg-gray-50 bg-white shadow-sm transition-all">
                        <i class="bi bi-eye text-gray-400"></i> Lihat Detail Order
                    </a>

                    <a href="{{ route('admin.orders.index') }}" 
                       class="w-full inline-flex items-center justify-center gap-2 px-4 py-2.5 border border-gray-200 rounded-xl text-sm font-medium text-gray-600 hover:text-gray-900 bg-gray-50/50 transition-all">
                        <i class="bi bi-arrow-left text-gray-400"></i> Kembali ke Daftar
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection