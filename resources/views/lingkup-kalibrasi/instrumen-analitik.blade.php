@extends('layouts.app')

@section('content')

{{-- INSTRUMEN ANALITIK --}}
<div class="container py-5">
    <h2 class="text-center fw-bold" style="color:#00695c;">Kalibrasi Instrumen Analitik</h2>
    <p class="text-center mb-4">Peralatan laboratorium kimia & analisis material.</p>

    <div class="row g-4">

        <!-- pH Meter -->
        <div class="col-md-4">
            <div class="card calib-card shadow-sm">
                <img src="{{ asset('images/analitik/ph-meter.jpg') }}" class="calib-img" alt="ph-meter">
                <div class="card-body">
                    <h5 class="calib-title">pH Meter</h5>
                    <p class="text-muted small mb-1">• Rentang: 0 – 14 pH</p>
                    <p class="text-muted small">• Fungsi: Analisis keasaman/kelebihan</p>
                </div>
            </div>
        </div>

        <!-- Conductivity Meter -->
        <div class="col-md-4">
            <div class="card calib-card shadow-sm">
                <img src="{{ asset('images/analitik/conductivity.jpg') }}" class="calib-img" alt="conductivity">
                <div class="card-body">
                    <h5 class="calib-title">Conductivity Meter</h5>
                    <p class="text-muted small mb-1">• Rentang: 0 – 200 mS/cm</p>
                    <p class="text-muted small">• Fungsi: Pengukuran konduktivitas larutan</p>
                </div>
            </div>
        </div>

        <!-- Spectrophotometer -->
        <div class="col-md-4">
            <div class="card calib-card shadow-sm">
                <img src="{{ asset('images/analitik/spectro.jpg') }}" class="calib-img" alt="spectrophotometer">
                <div class="card-body">
                    <h5 class="calib-title">Spectrophotometer</h5>
                    <p class="text-muted small mb-1">• Rentang: UV – VIS</p>
                    <p class="text-muted small">• Fungsi: Pengukuran absorbansi & konsentrasi</p>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection