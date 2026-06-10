@extends('layouts.technician')

@section('content')
<div class="bg-white rounded-2xl border border-gray-200 p-6 shadow-sm">

    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
        <div>
            <h2 class="text-xl font-bold text-gray-900 tracking-tight flex items-center gap-2">
                <i class="bi bi-clipboard-data text-blue-600"></i> Tugas Kalibrasi Anda
            </h2>
            <p class="text-xs text-gray-500 mt-1">Daftar seluruh instrumen laboratorium yang ditugaskan kepada Anda.</p>
        </div>
    </div>

    <div class="overflow-x-auto border border-gray-100 rounded-xl">
        <table class="w-full border-collapse text-left text-sm text-gray-600">
            <thead class="bg-gray-50/70 text-gray-700 font-semibold border-b border-gray-100">
                <tr>
                    <th class="px-6 py-3.5 font-bold text-xs uppercase tracking-wider text-center w-16">No</th>
                    <th class="px-6 py-3.5 font-bold text-xs uppercase tracking-wider">Nomor Order</th>
                    <th class="px-6 py-3.5 font-bold text-xs uppercase tracking-wider">Perusahaan / Customer</th>
                    <th class="px-6 py-3.5 font-bold text-xs uppercase tracking-wider">Status Progres</th>
                    <th class="px-6 py-3.5 font-bold text-xs uppercase tracking-wider text-center w-24">Aksi</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-100 bg-white">
                @forelse ($orders as $index => $order)
                <tr class="hover:bg-slate-50/80 transition-colors">
                    <td class="px-6 py-4 text-center font-medium text-gray-400">
                        {{ $index + 1 }}
                    </td>
                    <td class="px-6 py-4 font-mono font-bold text-gray-900 text-xs tracking-wider">
                        #{{ $order->order_number }}
                    </td>
                    <td class="px-6 py-4">
                        <span class="font-semibold text-gray-800 block">{{ $order->customer_name }}</span>
                        <span class="text-xs text-gray-400 block mt-0.5 flex items-center gap-1">
                            <i class="bi bi-tools text-[10px]"></i> {{ $order->instrument }}
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        @php
                            $statusClass = match(strtolower($order->status)) {
                                'completed' => 'bg-emerald-50 text-emerald-700 border-emerald-200',
                                'waiting certificate' => 'bg-indigo-50 text-indigo-700 border-indigo-200',
                                'calibration' => 'bg-rose-50 text-rose-700 border-rose-200',
                                'processing' => 'bg-blue-50 text-blue-700 border-blue-200',
                                default => 'bg-yellow-50 text-yellow-700 border-yellow-200',
                            };
                        @endphp
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold border {{ $statusClass }}">
                            <span class="w-1.5 h-1.5 rounded-full bg-current"></span>
                            {{ $order->status }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <a href="{{ route('technician.orders.show', $order->id) }}"
                           class="inline-flex items-center gap-1 px-3 py-1.5 bg-blue-50 hover:bg-blue-100 text-blue-600 rounded-xl text-xs font-bold transition-all border border-blue-100">
                           <i class="bi bi-folder2-open"></i> Kelola
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center py-12 text-gray-400">
                        <div class="flex flex-col items-center justify-center gap-2">
                            <i class="bi bi-inbox text-3xl text-gray-300"></i>
                            <p class="text-sm font-medium">Tidak ada data order kalibrasi yang ditugaskan ke Anda.</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection