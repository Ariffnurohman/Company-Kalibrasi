@extends('layouts.admin')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-6">

    <!-- Breadcrumb / Header -->
    <div class="mb-4">
        <h3 class="text-2xl font-semibold mb-0">Order Detail</h3>
        <p class="text-sm text-gray-500">Detail informasi Order #{{ $order->order_number }}</p>
    </div>

    <!-- Header Card -->
    <div class="bg-white shadow-sm rounded-2xl mb-6">
        <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-4 p-6">
            <div>
                <h4 class="text-xl font-bold">{{ $order->customer_name }}</h4>
                <p class="text-sm text-gray-500">Instrument: 
                    <span class="font-medium text-gray-700">{{ $order->instrument }}</span>
                </p>
            </div>

            <!-- Badge Status -->
            @php
                $status = $order->status ?? 'Unknown';
                $statusKey = strtolower($status);
                $statusMap = [
                    'pending' => 'bg-gray-100 text-gray-800',
                    'processing' => 'bg-blue-100 text-blue-800',
                    'calibration' => 'bg-yellow-100 text-yellow-800',
                    'waiting certificate' => 'bg-indigo-100 text-indigo-800',
                    'completed' => 'bg-green-100 text-green-800',
                ];
                $statusClasses = $statusMap[$statusKey] ?? 'bg-gray-200 text-gray-800';
            @endphp

            <span class="inline-flex items-center gap-2 px-3 py-2 rounded-full text-sm font-semibold {{ $statusClasses }}">
                @php
                    $icons = [
                        'pending' => '<svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>',
                        'processing' => '<svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9.75 3a.75.75 0 01.75-.75h3a.75.75 0 01.75.75V4.5h2.25a.75.75 0 01.75.75v3h-1.5V6H7.5v2.25H6V5.25a.75.75 0 01.75-.75H9V3z"/></svg>',
                        'calibration' => '<svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 24 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 7h4l2 7h6l2-7h4"/></svg>',
                        'waiting certificate' => '<svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0l3 3m-3-3l-3 3m0-6h6"/></svg>',
                        'completed' => '<svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>',
                        'default' => '<svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 12h.01M12 3a9 9 0 110 18 9 9 0 010-18z"/></svg>',
                    ];
                @endphp

                {!! $icons[$statusKey] ?? $icons['default'] !!}
                <span>{{ $status }}</span>
            </span>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <!-- LEFT CONTENT -->
        <div class="lg:col-span-2 space-y-6">

            <!-- Order Information -->
            <div class="bg-white shadow-sm rounded-2xl p-6">
                <h5 class="text-lg font-semibold mb-4">Order Information</h5>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm text-gray-500">Order Number</label>
                        <div class="mt-1 text-base font-semibold text-gray-800">{{ $order->order_number }}</div>
                    </div>

                    <div>
                        <label class="block text-sm text-gray-500">Customer Name</label>
                        <div class="mt-1 text-base font-semibold text-gray-800">{{ $order->customer_name }}</div>
                    </div>

                    <div>
                        <label class="block text-sm text-gray-500">Instrument</label>
                        <div class="mt-1 text-base font-semibold text-gray-800">{{ $order->instrument }}</div>
                    </div>

                    <div>
                        <label class="block text-sm text-gray-500">Other Info</label>
                        <div class="mt-1 text-base text-gray-700">{{ $order->other_info ?? '-' }}</div>
                    </div>
                </div>

                <div class="border-t border-gray-100 my-4"></div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm text-gray-500">Received Date</label>
                        <div class="mt-1 text-base font-medium text-gray-700">
                            {{ $order->received_date ? \Carbon\Carbon::parse($order->received_date)->format('d M Y') : '-' }}
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm text-gray-500">Completed Date</label>
                        <div class="mt-1 text-base font-medium text-gray-700">
                            {{ $order->completed_date ? \Carbon\Carbon::parse($order->completed_date)->format('d M Y') : '-' }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Workflow -->
            <div class="bg-white shadow-sm rounded-2xl p-6">
                <h5 class="text-lg font-semibold mb-3">Workflow Kalibrasi</h5>

                @if(!$order->workflow_notes && !$order->workflow_file)
                    <div class="text-center text-gray-500 bg-gray-50 p-4 rounded">Belum ada workflow dari teknisi.</div>
                @else
                    @if($order->workflow_notes)
                        <p class="text-sm text-gray-600 font-semibold mb-2">Catatan Teknisi:</p>
                        <div class="bg-gray-50 border border-gray-100 rounded p-4 text-sm text-gray-700 whitespace-pre-line mb-4">
                            {!! nl2br(e($order->workflow_notes)) !!}
                        </div>
                    @endif

                    @if($order->workflow_file)
                        <p class="text-sm text-gray-600 font-semibold mb-2">File Workflow:</p>
                        <a href="{{ asset('storage/' . $order->workflow_file) }}" target="_blank"
                           class="inline-flex items-center gap-2 px-3 py-2 border rounded-md text-sm font-medium hover:bg-gray-50">
                            <!-- download icon -->
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-width="2" d="M12 4v12m0 0l-4-4m4 4l4-4m-9 6h10" />
                            </svg>
                            Lihat / Download File
                        </a>
                    @endif
                @endif
            </div>

            <!-- Timeline -->
            <div class="bg-white shadow-sm rounded-2xl p-6">
                <h5 class="text-lg font-semibold text-center mb-4">Order Timeline</h5>

                @php
                    $steps = [
                        'Pending' => 'Order dibuat oleh admin / customer',
                        'Processing' => 'Order sedang diproses',
                        'Calibration' => 'Alat dalam proses kalibrasi',
                        'Waiting Certificate' => 'Menunggu sertifikat kalibrasi',
                        'Completed' => 'Order selesai'
                    ];

                    $keys = array_map('strtolower', array_keys($steps));
                    $currentIndex = array_search(strtolower($order->status), $keys);
                    if ($currentIndex === false) $currentIndex = -1;
                @endphp

                <ul class="relative border-l border-gray-200 pl-6 space-y-6">
                    @foreach($steps as $i => $desc)
                        @php
                            $stepIndex = array_search(strtolower($i), $keys);
                            $isDone = $stepIndex <= $currentIndex && $currentIndex !== -1;
                        @endphp

                        <li class="relative">
                            <span class="absolute -left-3 top-1.5 w-6 h-6 rounded-full flex items-center justify-center
                                {{ $isDone ? 'bg-green-500 text-white' : 'bg-white border border-gray-200 text-gray-400' }}">
                                @if($isDone)
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                                    </svg>
                                @else
                                    <span class="w-2 h-2 rounded-full bg-gray-300"></span>
                                @endif
                            </span>

                            <div class="pl-2">
                                <div class="flex items-center justify-between">
                                    <h6 class="font-medium text-gray-800">{{ $i }}</h6>
                                    @if($isDone)
                                        <span class="text-xs text-gray-500">Selesai</span>
                                    @endif
                                </div>
                                <p class="text-sm text-gray-500 mt-1">{{ $desc }}</p>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>

        </div>

        <!-- RIGHT SIDEBAR -->
        <div class="space-y-6">

            <!-- ACTIONS -->
            <div class="bg-white shadow-sm rounded-2xl p-6">
                <h5 class="text-lg font-semibold text-center mb-4">Actions</h5>

                <!-- Edit -->
                <a href="{{ route('admin.orders.edit', $order->id) }}"
                   class="w-full inline-flex items-center justify-center gap-2 mb-3 px-4 py-2 rounded-md bg-blue-600 text-white text-sm font-medium hover:bg-blue-700">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5h2m-1 1v2m7 7v3H5v-3M20 9H4m16 0v6m0-6a2 2 0 00-2-2h-4a2 2 0 01-2-2H8a2 2 0 00-2 2v2"/>
                    </svg>
                    Edit Order
                </a>

                <!-- Delete -->
                <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST"
                      onsubmit="return confirm('Delete this order?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="w-full inline-flex items-center justify-center gap-2 mb-3 px-4 py-2 rounded-md bg-red-600 text-white text-sm font-medium hover:bg-red-700">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 13h6m2 9H7a2 2 0 01-2-2V7h14v13a2 2 0 01-2 2zm3-16H6l1-3h10l1 3z"/>
                        </svg>
                        Delete Order
                    </button>
                </form>

                <!-- Back -->
                <a href="{{ route('admin.orders.index') }}"
                   class="w-full inline-flex items-center justify-center gap-2 px-4 py-2 rounded-md border border-gray-200 text-sm font-medium hover:bg-gray-50">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                    </svg>
                    Back to Orders
                </a>
            </div>

            <!-- QR CODE -->
            @if($order->qr_code)
                <div class="bg-white shadow-sm rounded-2xl p-6 text-center">
                    <h5 class="text-lg font-semibold mb-3">QR Code Tracking</h5>

                    <img src="data:image/svg+xml;base64,{{ $order->qr_code }}"
                         alt="QR Code"
                         class="mx-auto mb-3 max-w-[220px] w-full h-auto" />

                    <p class="text-sm text-gray-500 mb-3">Scan untuk cek status</p>

                    <a href="{{ url('/tracking/' . $order->order_number) }}"
                       target="_blank"
                       class="inline-flex items-center gap-2 px-3 py-2 border rounded-md text-sm font-medium hover:bg-gray-50">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" d="M10 6h4m-2-2v4m0 8a6 6 0 110-12 6 6 0 010 12z"/>
                        </svg>
                        Lihat Halaman Tracking
                    </a>
                </div>
            @endif

        </div>

    </div>
</div>
@endsection
