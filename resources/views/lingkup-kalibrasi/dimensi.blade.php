@extends('layouts.app')

@section('content')
<<style>
    .calib-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border-radius: 12px;
        overflow: hidden;
    }
    .calib-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.15);
    }
    .calib-img {
        height: 160px;
        object-fit: contain;
        background: #f8f9fa;
        padding: 15px;
    }
    .calib-title {
        font-weight: 700;
        color: #1c3faa;
    }
</style>

<div class="container py-5">
    <h2 class="text-center fw-bold" style="color:#1c3faa;">Kalibrasi Dimensi</h2>
    <p class="text-center mb-4">Layanan kalibrasi untuk alat ukur dimensi.</p>

    <div class="row g-4">

        <!-- Item 1 -->
        <div class="col-md-4">
            <div class="card calib-card shadow-sm">
                <img src="{{ asset('images/img/micrometer-outside.jpg') }}" alt="micrometer" >
                <div class="card-body">
                    <h5 class="calib-title">Outside Micrometer</h5>
                    <p class="text-muted small mb-1">• Rentang: 0-25 mm</p>
                    <p class="text-muted small mb-1">• Resolusi: 0.01 mm</p>
                    <p class="text-muted small">• Fungsi: Mengukur diameter luar & ketebalan benda kecil</p>
                </div>
            </div>
        </div>

        <!-- Item 2 -->
        <div class="col-md-4">
            <div class="card calib-card shadow-sm">
                 <img src="{{ asset('images/img/caliper-jangka-sorong.jpg') }}" alt="thickness">
                <div class="card-body">
                    <h5 class="calib-title">Caliper (Jangka Sorong)</h5>
                    <p class="text-muted small mb-1">• Rentang: 0-150 mm</p>
                    <p class="text-muted small mb-1">• Resolusi: 0.02 mm</p>
                    <p class="text-muted small">• Fungsi: Mengukur panjang, diameter dalam & luar</p>
                </div>
            </div>
        </div>

        <!-- Item 3 -->
        <div class="col-md-4">
            <div class="card calib-card shadow-sm">
                <img src="{{ asset('images/img/thickness.jpeg') }}" alt="caliper-jangka-sorong">
                <div class="card-body">
                    <h5 class="calib-title">Thickness Gauge</h5>
                    <p class="text-muted small mb-1">• Rentang: 0-10 mm</p>
                    <p class="text-muted small mb-1">• Resolusi: 0.001 mm</p>
                    <p class="text-muted small">• Fungsi: Mengukur ketebalan benda tipis</p>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
