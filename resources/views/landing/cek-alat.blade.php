@extends('layouts.cek-alat')

@section('content')

<section class="py-5 bg-light">
    <div class="container">

        <!-- Title -->
        <div class="text-center mb-5">
            <h2 class="fw-bold">Cek Status Kalibrasi Alat</h2>
            <p class="text-muted">Masukkan Nomor Order atau Nama PT untuk melihat progres kalibrasi</p>
        </div>

        <!-- Search Box -->
        <div class="card shadow-lg border-0 p-4 mx-auto" style="max-width: 650px;">
            <form action="{{ route('cek.alat') }}" method="POST">
                @csrf

                <div class="input-group input-group-lg">
                    <input type="text" name="keyword" class="form-control"
                        placeholder="Contoh: ORD-123456 atau PT Maju Jaya"
                        required>

                    <button class="btn btn-primary px-4">
                        <i class="bi bi-search me-2"></i> Cari
                    </button>
                </div>
            </form>
        </div>

        <!-- Search Results -->
        @if(isset($orders))
        <div class="mt-5">

            <h4 class="fw-bold mb-4">Hasil Pencarian untuk: <span class="text-primary">{{ $keyword }}</span></h4>

            @if($orders->count() == 0)
                <div class="alert alert-danger">
                    <i class="bi bi-x-circle me-2"></i> Data tidak ditemukan.
                </div>
            @else

                <div class="row g-4">
                    @foreach($orders as $o)
                    <div class="col-lg-6">
                        <div class="card shadow-sm border-0 h-100">
                            <div class="card-body">

                                <h5 class="fw-bold mb-1">
                                    <i class="bi bi-clipboard-check text-primary me-2"></i>
                                    {{ $o->order_number }}
                                </h5>

                                <p class="text-muted mb-2">
                                    <i class="bi bi-building me-2"></i>
                                    {{ $o->customer_name }}
                                </p>

                                <p class="mb-1">
                                    <i class="bi bi-tools me-2"></i>
                                    {{ $o->instrument }}
                                </p>

                                <p class="mb-1">
                                    <i class="bi bi-clock-history me-2"></i>
                                    <span class="badge 
                                        @if($o->status == 'Pending') bg-secondary
                                        @elseif($o->status == 'Processing') bg-info
                                        @elseif($o->status == 'Calibration') bg-warning text-dark
                                        @elseif($o->status == 'Waiting Certificate') bg-primary
                                        @elseif($o->status == 'Completed') bg-success
                                        @endif
                                    ">
                                        {{ $o->status }}
                                    </span>
                                </p>

                                <p class="text-muted mt-3 small">
                                    Diterima: {{ $o->received_date ?? '-' }} <br>
                                    Selesai: {{ $o->completed_date ?? '-' }}
                                </p>

                            </div>
                        </div>
                    </div>
                <div class="d-flex justify-content-between mt-3">

                        <a href="{{ route('download.qr', $o->order_number) }}" 
                        class="btn btn-outline-primary btn-sm">
                            <i class="bi bi-qr-code me-1"></i> Download QR
                        </a>

                        <a href="{{ url('/tracking/'.$o->order_number) }}" 
                            class="btn btn-primary btn-sm">
                        <i class="bi bi-eye me-1"></i> Lihat Detail
                        </a>

                     </div>
                    @endforeach
                </div>

            @endif

        </div>
        @endif
    </div>
</section>

@endsection
