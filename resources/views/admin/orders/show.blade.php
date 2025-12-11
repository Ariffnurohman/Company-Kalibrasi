@extends('layouts.admin')

@section('content')
<div class="max-w-6xl mx-auto px-3 sm:px-4 py-6">

    <!-- Header / Breadcrumb -->
    <div class="mb-4">
        <h3 class="text-xl sm:text-2xl font-semibold">Order Detail</h3>
        <p class="text-sm text-gray-500">Detail informasi Order #{{ $order->order_number }}</p>
    </div>

    <!-- Header Card -->
    <div class="bg-white shadow-sm rounded-2xl mb-6">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 p-4 sm:p-6">

            <!-- Customer Info -->
            <div>
                <h4 class="text-lg sm:text-xl font-bold">{{ $order->customer_name }}</h4>
                <p class="text-sm text-gray-500">
                    Instrument:
                    <span class="font-medium text-gray-700">{{ $order->instrument }}</span>
                </p>
            </div>

            <!-- Status Badge -->
            @php
                $status = strtolower($order->status ?? 'Unknown');
                $statusMap = [
                    'pending' => 'bg-gray-100 text-gray-800',
                    'processing' => 'bg-blue-100 text-blue-800',
                    'calibration' => 'bg-yellow-100 text-yellow-800',
                    'waiting certificate' => 'bg-indigo-100 text-indigo-800',
                    'completed' => 'bg-green-100 text-green-800',
                ];
                $statusClasses = $statusMap[$status] ?? 'bg-gray-200 text-gray-800';
            @endphp

            <span class="inline-flex items-center gap-2 px-3 py-2 rounded-full text-xs sm:text-sm font-semibold {{ $statusClasses }}">
                <span class="w-2.5 h-2.5 bg-current rounded-full"></span>
                {{ ucfirst($status) }}
            </span>
        </div>
    </div>

    <!-- CONTENT (Grid Auto Responsive) -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <!-- LEFT (Main Content) -->
        <div class="lg:col-span-2 space-y-6">

            <!-- Order Information -->
            <div class="bg-white shadow-sm rounded-2xl p-4 sm:p-6">
                <h5 class="text-lg font-semibold mb-4">Order Information</h5>

                <!-- Info Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm text-gray-500">Order Number</label>
                        <div class="font-semibold text-gray-800">{{ $order->order_number }}</div>
                    </div>

                    <div>
                        <label class="block text-sm text-gray-500">Customer Name</label>
                        <div class="font-semibold text-gray-800">{{ $order->customer_name }}</div>
                    </div>

                    <div>
                        <label class="block text-sm text-gray-500">Instrument</label>
                        <div class="font-semibold text-gray-800">{{ $order->instrument }}</div>
                    </div>

                    <div>
                        <label class="block text-sm text-gray-500">Other Info</label>
                        <div class="text-gray-700">{{ $order->other_info ?? '-' }}</div>
                    </div>
                </div>

                <div class="border-t border-gray-100 my-4"></div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm text-gray-500">Received Date</label>
                        <div class="mt-1 text-gray-700">
                            {{ $order->received_date ? \Carbon\Carbon::parse($order->received_date)->format('d M Y') : '-' }}
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm text-gray-500">Completed Date</label>
                        <div class="mt-1 text-gray-700">
                            {{ $order->completed_date ? \Carbon\Carbon::parse($order->completed_date)->format('d M Y') : '-' }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Workflow -->
            <div class="bg-white shadow-sm rounded-2xl p-4 sm:p-6">
                <h5 class="text-lg font-semibold mb-3">Workflow Kalibrasi</h5>

                @if(!$order->workflow_notes && !$order->workflow_file)
                    <div class="text-center text-gray-500 bg-gray-50 p-4 rounded">
                        Belum ada workflow dari teknisi.
                    </div>
                @else
                    @if($order->workflow_notes)
                        <p class="text-sm text-gray-600 font-semibold">Catatan Teknisi:</p>
                        <div class="bg-gray-50 p-4 rounded mt-2 border text-sm text-gray-700 whitespace-pre-line">
                            {!! nl2br(e($order->workflow_notes)) !!}
                        </div>
                    @endif

                    @if($order->workflow_file)
                        <a href="{{ asset('storage/' . $order->workflow_file) }}" target="_blank"
                           class="mt-4 inline-flex items-center gap-2 px-3 py-2 border rounded-md text-sm font-medium hover:bg-gray-50">
                            📄 Lihat / Download File
                        </a>
                    @endif
                @endif
            </div>

            <!-- Timeline -->
            <div class="bg-white shadow-sm rounded-2xl p-4 sm:p-6">
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
                    $currentIndex = array_search(strtolower($order->status), $keys) ?? -1;
                @endphp

                <ul class="relative border-l border-gray-200 pl-4 sm:pl-6 space-y-6">
                    @foreach($steps as $i => $desc)
                        @php
                            $stepIndex = array_search(strtolower($i), $keys);
                            $isDone = $stepIndex <= $currentIndex && $currentIndex !== -1;
                        @endphp

                        <li class="relative">
                            <span class="absolute -left-3 sm:-left-3 top-1.5 w-5 h-5 sm:w-6 sm:h-6 rounded-full flex items-center justify-center
                                {{ $isDone ? 'bg-green-500 text-white' : 'bg-white border border-gray-300 text-gray-400' }}">
                                @if($isDone)
                                    ✓
                                @endif
                            </span>

                            <div class="pl-2">
                                <h6 class="font-medium text-gray-800 text-sm sm:text-base">{{ $i }}</h6>
                                <p class="text-xs sm:text-sm text-gray-500 mt-1">{{ $desc }}</p>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>

        </div>

        <!-- RIGHT SIDEBAR (Auto move bottom in mobile) -->
        <div class="space-y-6">

            <!-- Actions -->
            <div class="bg-white shadow-sm rounded-2xl p-4 sm:p-6">
                <h5 class="text-lg font-semibold text-center mb-4">Actions</h5>

                <a href="{{ route('admin.orders.edit', $order->id) }}"
                   class="w-full inline-flex items-center justify-center gap-2 mb-3 px-4 py-2 rounded-md bg-blue-600 text-white text-sm font-medium">
                   ✏️ Edit Order
                </a>

                <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" onsubmit="return confirm('Delete this order?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="w-full inline-flex items-center justify-center gap-2 mb-3 px-4 py-2 rounded-md bg-red-600 text-white text-sm font-medium">
                        🗑️ Delete Order
                    </button>
                </form>

                <a href="{{ route('admin.orders.index') }}"
                   class="w-full inline-flex items-center justify-center gap-2 px-4 py-2 rounded-md border text-sm font-medium">
                   ← Back to Orders
                </a>
            </div>

            <!-- QR Code -->
            @if($order->qr_code)
                <div class="bg-white shadow-sm rounded-2xl p-4 sm:p-6 text-center">
                    <h5 class="text-lg font-semibold mb-3">QR Code Tracking</h5>

                    <img src="data:image/svg+xml;base64,{{ $order->qr_code }}"
                         class="mx-auto w-40 sm:w-52 h-auto mb-3" />

                    <p class="text-sm text-gray-500 mb-3">Scan untuk cek status</p>

                    <a href="{{ url('/tracking/' . $order->order_number) }}" target="_blank"
                       class="inline-flex items-center gap-2 px-3 py-2 border rounded-md text-sm font-medium">
                       🔍 Lihat Halaman Tracking
                    </a>
                </div>
            @endif

        </div>
    </div>
</div>
@endsection
