@extends('layouts.tracking')

@section('content')
<div class="max-w-4xl mx-auto">

    @if(isset($order))
        {{-- ========================================================================= --}}
        {{-- TAMPILAN 1: HASIL DETEKSI ORDER (TIMELINE PROSES AKTIF)                  --}}
        {{-- ========================================================================= --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            <div class="md:col-span-1 space-y-4">
                <div class="bg-white rounded-2xl border border-gray-200 p-5 shadow-sm">
                    <span class="text-[10px] font-bold tracking-wider text-indigo-600 uppercase bg-indigo-50 px-2.5 py-1 rounded-md">
                        Manifes Alat
                    </span>
                    
                    <h2 class="text-xl font-bold text-gray-900 mt-4 font-mono">#{{ $order->order_number }}</h2>
                    <p class="text-xs text-gray-400 mt-0.5">Simpan nomor ini untuk pengecekan berkala</p>

                    <div class="mt-6 space-y-4 border-t border-gray-100 pt-4 text-sm">
                        <div>
                            <label class="text-[11px] font-bold text-gray-400 uppercase tracking-wider block">Nama Customer</label>
                            <span class="font-semibold text-gray-800 block mt-0.5">{{ $order->customer_name }}</span>
                        </div>
                        <div>
                            <label class="text-[11px] font-bold text-gray-400 uppercase tracking-wider block">Nama Alat / Instrumen</label>
                            <span class="font-medium text-gray-700 block mt-0.5">{{ $order->instrument }}</span>
                        </div>
                        <div>
                            <label class="text-[11px] font-bold text-gray-400 uppercase tracking-wider block">Tanggal Masuk</label>
                            <span class="text-gray-600 block mt-0.5">
                                {{ \Carbon\Carbon::parse($order->received_date)->format('d M Y') }}
                            </span>
                        </div>
                        <div>
                            <label class="text-[11px] font-bold text-gray-400 uppercase tracking-wider block">Status Aktual</label>
                            @php
                                $statusClass = match(strtolower($order->status)) {
                                    'completed' => 'bg-green-50 text-green-700 border-green-200',
                                    'waiting certificate' => 'bg-indigo-50 text-indigo-700 border-indigo-200',
                                    'calibration' => 'bg-red-50 text-red-700 border-red-200',
                                    'processing' => 'bg-blue-50 text-blue-700 border-blue-200',
                                    default => 'bg-yellow-50 text-yellow-700 border-yellow-200',
                                };
                            @endphp
                            <span class="inline-block mt-1 px-2.5 py-1 text-xs font-bold rounded-md border {{ $statusClass }}">
                                {{ $order->status }}
                            </span>
                        </div>
                    </div>
                </div>

                <a href="{{ url('/tracking') }}" class="flex items-center justify-center gap-2 w-full py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 text-xs font-bold rounded-xl transition-all">
                    🔄 Cari Order Lain
                </a>
            </div>

            <div class="md:col-span-2">
                <div class="bg-white rounded-2xl border border-gray-200 p-6 sm:p-8 shadow-sm">
                    <h3 class="text-base font-bold text-gray-900 mb-6 flex items-center gap-2">
                        ⏱️ Progress Real-time Laboratorium
                    </h3>

                    @php
                        $currentStatus = strtolower($order->status);
                        $statusSteps = ['pending', 'processing', 'calibration', 'waiting certificate', 'completed'];
                        $currentStepIndex = array_search($currentStatus, $statusSteps);
                        if ($currentStepIndex === false) $currentStepIndex = 0; 
                    @endphp

                    <div class="relative pl-6 border-l-2 border-gray-200 space-y-8 ml-3">
                        
                        <div class="relative">
                            @php $isActive = $currentStepIndex >= 0; @endphp
                            <span class="absolute -left-[33px] top-0.5 flex items-center justify-center w-5 h-5 rounded-full ring-4 ring-white text-[10px] {{ $isActive ? 'bg-indigo-600 text-white' : 'bg-gray-200 text-gray-400' }}">
                                {!! $currentStepIndex == 0 ? '●' : '✓' !!}
                            </span>
                            <div class="{{ $currentStepIndex == 0 ? 'bg-slate-50 p-3 rounded-xl border border-gray-100' : '' }}">
                                <h4 class="text-sm font-bold {{ $isActive ? 'text-gray-900' : 'text-gray-400' }}">Order Terdaftar (Pending)</h4>
                                <p class="text-xs text-gray-500 mt-0.5">Alat telah diterima oleh tim logistik dan sedang dalam antrean penjadwalan teknisi.</p>
                            </div>
                        </div>

                        <div class="relative">
                            @php $isActive = $currentStepIndex >= 1; @endphp
                            <span class="absolute -left-[33px] top-0.5 flex items-center justify-center w-5 h-5 rounded-full ring-4 ring-white text-[10px] {{ $isActive ? 'bg-indigo-600 text-white' : 'bg-gray-200 text-gray-400' }}">
                                {!! $currentStepIndex == 1 ? '●' : ($currentStepIndex > 1 ? '✓' : '') !!}
                            </span>
                            <div class="{{ $currentStepIndex == 1 ? 'bg-slate-50 p-3 rounded-xl border border-gray-100' : '' }}">
                                <h4 class="text-sm font-bold {{ $isActive ? 'text-gray-900' : 'text-gray-400' }}">Inspeksi & Pra-Kondisi (Processing)</h4>
                                <p class="text-xs text-gray-500 mt-0.5">Alat memasuki ruang lab untuk pengecekan fungsi kelistrikan mendasar dan penyesuaian suhu ruang acuan.</p>
                            </div>
                        </div>

                        <div class="relative">
                            @php $isActive = $currentStepIndex >= 2; @endphp
                            <span class="absolute -left-[33px] top-0.5 flex items-center justify-center w-5 h-5 rounded-full ring-4 ring-white text-[10px] {{ $isActive ? 'bg-indigo-600 text-white' : 'bg-gray-200 text-gray-400' }}">
                                {!! $currentStepIndex == 2 ? '●' : ($currentStepIndex > 2 ? '✓' : '') !!}
                            </span>
                            <div class="{{ $currentStepIndex == 2 ? 'bg-slate-50 p-3 rounded-xl border border-gray-100' : '' }}">
                                <h4 class="text-sm font-bold {{ $isActive ? 'text-gray-900' : 'text-gray-400' }}">Pengambilan Data (Calibration)</h4>
                                <p class="text-xs text-gray-500 mt-0.5">Teknisi ahli sedang melakukan kalibrasi dan mencocokkan deviasi alat dengan standar tertelusur.</p>
                            </div>
                        </div>

                        <div class="relative">
                            @php $isActive = $currentStepIndex >= 3; @endphp
                            <span class="absolute -left-[33px] top-0.5 flex items-center justify-center w-5 h-5 rounded-full ring-4 ring-white text-[10px] {{ $isActive ? 'bg-indigo-600 text-white' : 'bg-gray-200 text-gray-400' }}">
                                {!! $currentStepIndex == 3 ? '●' : ($currentStepIndex > 3 ? '✓' : '') !!}
                            </span>
                            <div class="{{ $currentStepIndex == 3 ? 'bg-slate-50 p-3 rounded-xl border border-gray-100' : '' }}">
                                <h4 class="text-sm font-bold {{ $isActive ? 'text-gray-900' : 'text-gray-400' }}">Penerbitan Sertifikat</h4>
                                <p class="text-xs text-gray-500 mt-0.5">Data ketidakpastian dihitung. Sertifikat fisik dan lembar laporan resmi sedang dicetak.</p>
                            </div>
                        </div>

                        <div class="relative">
                            @php $isActive = $currentStepIndex == 4; @endphp
                            <span class="absolute -left-[33px] top-0.5 flex items-center justify-center w-5 h-5 rounded-full ring-4 ring-white text-[10px] {{ $isActive ? 'bg-green-600 text-white' : 'bg-gray-200 text-gray-400' }}">
                                {!! $isActive ? '✓' : '' !!}
                            </span>
                            <div class="{{ $isActive ? 'bg-green-50 p-3 rounded-xl border border-green-100' : '' }}">
                                <h4 class="text-sm font-bold {{ $isActive ? 'text-green-800' : 'text-gray-400' }}">Selesai & Siap Diambil (Completed)</h4>
                                <p class="text-xs text-gray-500 mt-0.5">Proses selesai. Alat dan dokumen sertifikat dapat diambil di counter logistik atau menunggu jadwal pengiriman.</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    @else
        {{-- ========================================================================= --}}
        {{-- TAMPILAN 2: HALAMAN LANDING UTAMA (FORM INPUT PENCARIAN)                 --}}
        {{-- ========================================================================= --}}
        <div class="max-w-md mx-auto text-center py-8">
            <div class="w-16 h-16 bg-indigo-50 border border-indigo-100 rounded-2xl flex items-center justify-center text-indigo-600 text-2xl mx-auto mb-6 shadow-sm">
                🔍
            </div>
            
            <h2 class="text-2xl font-bold text-gray-900 tracking-tight">Lacak Status Kalibrasi</h2>
            <p class="text-gray-500 text-sm mt-1.5 mb-8">Masukkan nomor kode order unik Anda yang tertera di surat tanda terima alat laboratorium.</p>

            {{-- Pesan Error Jika Cari Kode Tapi Tidak Ditemukan --}}
            @if(session('error'))
                <div class="mb-4 p-3 bg-red-50 border border-red-200 rounded-xl text-xs text-red-600 text-left font-medium">
                    ⚠️ {{ session('error') }}
                </div>
            @endif

            <form action="{{ url('/tracking-search') }}" method="GET" class="space-y-4">
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-gray-400 font-mono text-sm">
                        #
                    </span>
                    <input type="text" name="order_number" placeholder="Contoh: ORD-17182910" required
                           class="w-full pl-8 pr-4 py-3 border border-gray-300 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-600 shadow-sm uppercase font-semibold tracking-wider placeholder:normal-case placeholder:font-normal" />
                </div>
                
                <button type="submit" class="w-full py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold text-sm rounded-xl transition-all shadow-md shadow-indigo-600/10">
                    Periksa Progres Sekarang
                </button>
            </form>
        </div>
    @endif

</div>
@endsection