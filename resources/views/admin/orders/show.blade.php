@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4 ">

    <!-- Breadcrumb -->
    <div class="mb-4">
        <h3 class="fw-bold text-xl font-bold mb-0">Order Detail</h3>
        <small class="text-muted">Detail informasi Order #{{ $order->order_number }}</small>
    </div>

    <!-- Header Card -->
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body d-flex justify-content-between align-items-center">
            <div>
                <h4 class="fw-bold font-bold text-xl mb-1">{{ $order->customer_name }}</h4>
                <span class="text-muted">Instrument: {{ $order->instrument }}</span>
            </div>

            <!-- Badge Status -->
            <span class="badge 
                @if($order->status == 'Pending') bg-secondary 
                @elseif($order->status == 'Processing') bg-info 
                @elseif($order->status == 'Calibration') bg-warning 
                @elseif($order->status == 'Waiting Certificate') bg-primary 
                @elseif($order->status == 'Completed') bg-success 
                @else bg-dark
                @endif
                px-3 py-2 fs-6">
                {{ $order->status }}
            </span> 
        </div>
    </div>

    <div class="row">
        <!-- LEFT COLUMN -->
        <div class="col-md-8">

            <!-- Detail Card -->
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header font-bold text-lg py-3">
                    <h5 class="fw-bold mb-0">Order Information</h5>
                </div>
                <div class="card-body">

                    <div class="mb-3">
                        <label class="text-muted">Order Number</label>
                        <div class="fw-semibold fs-5">{{ $order->order_number }}</div>
                    </div>

                    <hr>

                    <div class="mb-3">
                        <label class="text-muted">Customer Name</label>
                        <div class="fw-semibold">{{ $order->customer_name }}</div>
                    </div>

                    <div class="mb-3">
                        <label class="text-muted">Instrument</label>
                        <div class="fw-semibold">{{ $order->instrument }}</div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="text-muted">Received Date</label>
                            <div class="fw-semibold">
                                {{ $order->received_date ?? '-' }}
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="text-muted">Completed Date</label>
                            <div class="fw-semibold">
                                {{ $order->completed_date ?? '-' }}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            {{-- WORKFLOW TEKNISI --}}
            <div class="card mt-4 shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-2 font-semibold text-center text-lg fw-bold">Workflow Kalibrasi</h5>
                </div>

                <div class="card-body">
                    @if(!$order->workflow_notes && !$order->workflow_file)
                    <p class="text-muted bg-light text-center p-3 rounded">Belum ada workflow dari teknisi.</p>
                    @else
                    <p><strong>Catatan Teknisi:</strong></p>
                    <div class="border p-3 bg-light text-center rounded mb-3">
                        {!! nl2br(e($order->workflow_notes)) !!}
                    </div>

                    @if ($order->workflow_file)
                    <p><strong>File Workflow:</strong></p>
                    <a href="{{ asset('storage/' . $order->workflow_file) }}"
                        target="_blank"
                        class="btn btn-outline-primary btn-sm">
                        Lihat / Download File
                    </a>
                    @endif
                    @endif
                </div>
            </div>

            <!-- Timeline -->
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header text-center bg-primary text-white py-3">
                    <h5 class="fw-bold font-bold text-lg mb-0">Order Timeline</h5>
                </div>
                <div class="card-body">

                    @php
                    $steps = [
                    'Pending' => 'Order dibuat oleh admin / customer',
                    'Processing' => 'Order sedang diproses',
                    'Calibration' => 'Alat dalam proses kalibrasi',
                    'Waiting Certificate' => 'Menunggu sertifikat kalibrasi',
                    'Completed' => 'Order selesai'
                    ];
                    @endphp

                    <ul class="timeline list-unstyled">
                        @foreach($steps as $step => $desc)
                        <li class="d-flex mb-4">
                            <div class="me-3">
                                <span class="
                                        @if(array_search($order->status, array_keys($steps)) >= array_search($step, array_keys($steps)))
                                            bg-primary
                                        @else
                                            bg-light border
                                        @endif
                                        rounded-circle d-inline-block"
                                    style="width:18px; height:18px;">
                                </span>
                            </div>
                            <div>
                                <strong>{{ $step }}</strong>
                                <div class="text-muted small">{{ $desc }}</div>
                            </div>
                        </li>
                        @endforeach
                    </ul>

                </div>
            </div>

        </div>



        <!-- RIGHT COLUMN -->
        <div class="col-md-4">

            <!-- ACTIONS CARD -->
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header py-3">
                    <h5 class="fw-bold text-lg font-bold text-center mb-0">Actions</h5>
                </div>
                <div class="card-body">

                    <a href="{{ route('admin.orders.edit', $order->id) }}"
                        class="btn btn-primary w-100 mb-2">
                        <i class="bi bi-pencil-square me-2"></i> Edit Order
                    </a>

                    <form action="{{ route('admin.orders.destroy', $order->id) }}"
                        method="POST"
                        onsubmit="return confirm('Delete this order?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger w-100 mb-2">
                            <i class="bi bi-trash me-2"></i> Delete Order
                        </button>
                    </form>

                    <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary w-100">
                        <i class="bi bi-arrow-left me-2"></i> Back to Orders
                    </a>

                </div>
            </div>

            <!-- QR CODE CARD -->
            @if($order->qr_code)
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white py-3">
                    <h5 class="fw-bold mb-0">QR Code Tracking</h5>
                </div>
                <div class="card-body text-center">

                    <img src="data:image/svg+xml;base64,{{ $order->qr_code }}"
                        alt="QR Code"
                        class="img-fluid mb-3"
                        style="max-width: 220px;">

                    <small class="text-muted d-block mb-1">Scan untuk cek status</small>

                    <a href="{{ url('/tracking/' . $order->order_number) }}"
                        target="_blank"
                        class="btn btn-outline-primary btn-sm">
                        Lihat Halaman Tracking
                    </a>

                </div>
            </div>
            @endif

        </div>

    </div>
</div>
@endsection