<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pelacakan Kalibrasi Instrumen - PT Rukun Sejahtera Teknik</title>

    <link rel="icon" type="image/png" href="{{ asset('images/rukun-logo_5.png') }}">

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-slate-50 min-h-screen flex flex-col justify-between antialiased">

    <header class="bg-white/80 backdrop-blur-md sticky top-0 z-50 border-b border-slate-200/80 shadow-sm">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 h-16 flex justify-between items-center">
            <div class="flex items-center gap-3">
                <img src="{{ asset('images/rukun-logo_5.png') }}" alt="Rukun Logo" class="h-8 w-auto object-contain">
                <div class="h-5 w-[1px] bg-slate-300 hidden sm:block"></div>
                <span class="text-xs font-bold text-slate-400 tracking-wider uppercase hidden sm:block">Tracking System</span>
            </div>
            <a href="/" class="text-xs font-semibold text-indigo-600 hover:text-indigo-700 transition-colors flex items-center gap-1">
                <i class="bi bi-arrow-left"></i> Kembali ke Beranda
            </a>
        </div>
    </header>

    <main class="flex-1 max-w-4xl w-full mx-auto px-4 sm:px-6 py-10">
        
        @if(isset($order))
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                
                <div class="md:col-span-1 space-y-6">
                    <div class="bg-white rounded-2xl border border-slate-200 p-5 shadow-sm">
                        <span class="text-[10px] font-bold tracking-wider text-indigo-600 uppercase bg-indigo-50 px-2.5 py-1 rounded-md">
                            Manifes Alat
                        </span>
                        
                        <h2 class="text-xl font-bold text-slate-900 mt-4 font-mono">#{{ $order->order_number }}</h2>
                        <p class="text-xs text-slate-400 mt-0.5">Gunakan nomor ini untuk pelacakan ulang</p>

                        <div class="mt-6 space-y-4 border-t border-slate-100 pt-4 text-sm">
                            <div>
                                <label class="text-[11px] font-bold text-slate-400 uppercase tracking-wider block">Nama Perusahaan</label>
                                <span class="font-semibold text-slate-800 block mt-0.5">{{ $order->customer_name }}</span>
                            </div>
                            <div>
                                <label class="text-[11px] font-bold text-slate-400 uppercase tracking-wider block">Nama Alat / Instrumen</label>
                                <span class="font-medium text-slate-700 block mt-0.5">{{ $order->instrument }}</span>
                            </div>
                            <div>
                                <label class="text-[11px] font-bold text-slate-400 uppercase tracking-wider block">Tanggal Masuk Lab</label>
                                <span class="text-slate-600 block mt-0.5">
                                    <i class="bi bi-calendar3 text-slate-400 mr-1 text-xs"></i> 
                                    {{ \Carbon\Carbon::parse($order->received_date)->format('d M Y') }}
                                </span>
                            </div>
                            <div>
                                <label class="text-[11px] font-bold text-slate-400 uppercase tracking-wider block">Estimasi Selesai</label>
                                <span class="text-slate-600 block mt-0.5">
                                    <i class="bi bi-calendar-check text-slate-400 mr-1 text-xs"></i>
                                    {{ $order->completed_date ? \Carbon\Carbon::parse($order->completed_date)->format('d M Y') : 'Dalam Proses Antrean' }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="md:col-span-2">
                    <div class="bg-white rounded-2xl border border-slate-200 p-6 sm:p-8 shadow-sm">
                        <h3 class="text-base font-bold text-slate-900 mb-6 flex items-center gap-2">
                            <i class="bi bi-bezier2 text-indigo-600"></i> Progres Kalibrasi Aktual
                        </h3>

                        @php
                            // Mengonversi status database ke tingkatan indeks untuk kontrol visual bar progress
                            $currentStatus = strtolower($order->status);
                            $statusSteps = ['pending', 'processing', 'calibration', 'waiting certificate', 'completed'];
                            $currentStepIndex = array_search($currentStatus, $statusSteps);
                            if ($currentStepIndex === false) $currentStepIndex = 0; 
                        @endphp

                        <div class="relative pl-6 border-l-2 border-slate-100 space-y-8 ml-3">
                            
                            <div class="relative">
                                @php $isActive = $currentStepIndex >= 0; @endphp
                                <span class="absolute -left-[35px] top-0 flex items-center justify-center w-6 h-6 rounded-full ring-4 ring-white shadow-sm {{ $isActive ? 'bg-indigo-600 text-white' : 'bg-slate-200 text-slate-400' }}">
                                    <i class="bi {{ $currentStepIndex == 0 ? 'bi-circle-fill text-[8px] animate-pulse' : 'bi-check-lg text-xs' }}"></i>
                                </span>
                                <div class="{{ $currentStepIndex == 0 ? 'bg-slate-50 p-4 border border-slate-200/60 rounded-xl' : '' }}">
                                    <h4 class="text-sm font-bold {{ $isActive ? 'text-slate-900' : 'text-slate-400' }}">Order Registrasi Berhasil</h4>
                                    <p class="text-xs text-slate-500 mt-1">Instrumen pendaftaran telah diterima logistik laboratorium dan masuk daftar tunggu antrean teknisi.</p>
                                </div>
                            </div>

                            <div class="relative">
                                @php $isActive = $currentStepIndex >= 1; @endphp
                                <span class="absolute -left-[35px] top-0 flex items-center justify-center w-6 h-6 rounded-full ring-4 ring-white shadow-sm {{ $isActive ? 'bg-indigo-600 text-white' : 'bg-slate-200 text-slate-400' }}">
                                    <i class="bi {{ $currentStepIndex == 1 ? 'bi-circle-fill text-[8px] animate-pulse' : ($currentStepIndex > 1 ? 'bi-check-lg text-xs' : 'bi-circle text-[8px]') }}"></i>
                                </span>
                                <div class="{{ $currentStepIndex == 1 ? 'bg-slate-50 p-4 border border-slate-200/60 rounded-xl' : '' }}">
                                    <h4 class="text-sm font-bold {{ $isActive ? 'text-slate-900' : 'text-slate-400' }}">Pemeriksaan Awal (Processing)</h4>
                                    <p class="text-xs text-slate-500 mt-1">Alat sedang diperiksa kondisi fisik, kelengkapan aksesoris, dan fungsi kelistrikan mendasar sebelum penyetelan.</p>
                                </div>
                            </div>

                            <div class="relative">
                                @php $isActive = $currentStepIndex >= 2; @endphp
                                <span class="absolute -left-[35px] top-0 flex items-center justify-center w-6 h-6 rounded-full ring-4 ring-white shadow-sm {{ $isActive ? 'bg-indigo-600 text-white' : 'bg-slate-200 text-slate-400' }}">
                                    <i class="bi {{ $currentStepIndex == 2 ? 'bi-circle-fill text-[8px] animate-pulse' : ($currentStepIndex > 2 ? 'bi-check-lg text-xs' : 'bi-circle text-[8px]') }}"></i>
                                </span>
                                <div class="{{ $currentStepIndex == 2 ? 'bg-slate-50 p-4 border border-slate-200/60 rounded-xl' : '' }}">
                                    <h4 class="text-sm font-bold {{ $isActive ? 'text-slate-900' : 'text-slate-400' }}">Proses Kalibrasi Laboratorium</h4>
                                    <p class="text-xs text-slate-500 mt-1">Instrumen sedang dikalibrasi oleh teknisi penanggung jawab menggunakan standar acuan nasional/internasional yang tertelusur.</p>
                                </div>
                            </div>

                            <div class="relative">
                                @php $isActive = $currentStepIndex >= 3; @endphp
                                <span class="absolute -left-[35px] top-0 flex items-center justify-center w-6 h-6 rounded-full ring-4 ring-white shadow-sm {{ $isActive ? 'bg-indigo-600 text-white' : 'bg-slate-200 text-slate-400' }}">
                                    <i class="bi {{ $currentStepIndex == 3 ? 'bi-circle-fill text-[8px] animate-pulse' : ($currentStepIndex > 3 ? 'bi-check-lg text-xs' : 'bi-circle text-[8px]') }}"></i>
                                </span>
                                <div class="{{ $currentStepIndex == 3 ? 'bg-slate-50 p-4 border border-slate-200/60 rounded-xl' : '' }}">
                                    <h4 class="text-sm font-bold {{ $isActive ? 'text-slate-900' : 'text-slate-400' }}">Penerbitan Sertifikat Resmi</h4>
                                    <p class="text-xs text-slate-500 mt-1">Data perhitungan ketidakpastian selesai dihitung, sertifikat kalibrasi fisik & digital sedang dicetak dan ditandatangani kepala laboratorium.</p>
                                </div>
                            </div>

                            <div class="relative">
                                @php $isActive = $currentStepIndex == 4; @endphp
                                <span class="absolute -left-[35px] top-0 flex items-center justify-center w-6 h-6 rounded-full ring-4 ring-white shadow-sm {{ $isActive ? 'bg-emerald-500 text-white' : 'bg-slate-200 text-slate-400' }}">
                                    <i class="bi bi-check-all text-sm"></i>
                                </span>
                                <div class="{{ $isActive ? 'bg-emerald-50/60 p-4 border border-emerald-200 rounded-xl' : '' }}">
                                    <h4 class="text-sm font-bold {{ $isActive ? 'text-emerald-700' : 'text-slate-400' }}">Pekerjaan Selesai (Completed)</h4>
                                    <p class="text-xs {{ $isActive ? 'text-emerald-600/90' : 'text-slate-500' }} mt-1">Alat telah selesai dikalibrasi sempurna dan sertifikat sah diterbitkan. Unit siap untuk diambil kembali atau dikirim ke alamat Anda.</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        @else
            <div class="max-w-md mx-auto text-center py-12">
                <div class="w-16 h-16 bg-indigo-50 border border-indigo-100 rounded-2xl flex items-center justify-center text-indigo-600 text-2xl mx-auto mb-6 shadow-sm">
                    <i class="bi bi-search-heart"></i>
                </div>
                <h2 class="text-xl font-bold text-slate-900 tracking-tight">Lacak Status Alat Anda</h2>
                <p class="text-slate-500 text-sm mt-1 mb-8">Masukkan kode nomor order unik Anda yang tertera pada tanda terima logistik PT. Rukun Sejahtera Teknik.</p>

                <form action="#" method="GET" class="space-y-3">
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-slate-400">
                            <i class="bi bi-hash"></i>
                        </span>
                        <input type="text" placeholder="Contoh: ORD-1718291" required
                               class="w-full pl-9 pr-4 py-3 border border-slate-300 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-600 shadow-sm uppercase tracking-wider font-semibold" />
                    </div>
                    <button type="submit" class="w-full py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold text-sm rounded-xl transition-all shadow-md shadow-indigo-600/10">
                        Periksa Progres Sekarang
                    </button>
                </form>
            </div>
        @endif

    </main>

    <footer class="bg-white border-t border-slate-200/80 text-center text-xs font-medium text-slate-400 py-6 tracking-wide">
        <div class="max-w-5xl mx-auto px-4">
            © {{ date('Y') }} PT. Rukun Sejahtera Teknik — Calibration Laboratory System. All Rights Reserved.
        </div>
    </footer>

</body>

</html>