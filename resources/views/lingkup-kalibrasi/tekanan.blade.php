@extends('layouts.app')

@section('content')
{{-- KALIBRASI TEKANAN --}}
<div class="container py-5">
    <h2 class="text-center fw-bold" style="color:#004085;">Kalibrasi Tekanan</h2>
    <p class="text-center mb-4">Layanan kalibrasi untuk alat ukur tekanan.</p>

    <div class="row g-4">

        <!-- Pressure Gauge -->
        <div class="col-md-4">
            <div class="card calib-card shadow-sm">
                <img src="{{ asset('images/tekanan/pressure-gauge.jpg') }}" class="calib-img" alt="pressure-gauge">
                <div class="card-body">
                    <h5 class="calib-title">Pressure Gauge</h5>
                    <p class="text-muted small mb-1">• Rentang: 0 – 1000 bar</p>
                    <p class="text-muted small mb-1">• Tipe: Analog / Digital</p>
                    <p class="text-muted small">• Fungsi: Mengukur tekanan fluida</p>
                </div>
            </div>
        </div>

        <!-- Digital Manometer -->
        <div class="col-md-4">
            <div class="card calib-card shadow-sm">
                <img src="{{ asset('images/tekanan/manometer-digital.jpg') }}" class="calib-img" alt="manometer-digital">
                <div class="card-body">
                    <h5 class="calib-title">Digital Manometer</h5>
                    <p class="text-muted small mb-1">• Rentang: -1 – 20 bar</p>
                    <p class="text-muted small mb-1">• Resolusi: 0.001 bar</p>
                    <p class="text-muted small">• Fungsi: Pengukuran tekanan presisi</p>
                </div>
            </div>
        </div>

        <!-- Vacuum Gauge -->
        <div class="col-md-4">
            <div class="card calib-card shadow-sm">
                <img src="{{ asset('images/tekanan/vacuum-gauge.jpg') }}" class="calib-img" alt="vacuum-gauge">
                <div class="card-body">
                    <h5 class="calib-title">Vacuum Gauge</h5>
                    <p class="text-muted small mb-1">• Rentang: 0 – (-1) bar</p>
                    <p class="text-muted small mb-1">• Tipe: Pirani, Bourdon, Digital</p>
                    <p class="text-muted small">• Fungsi: Pengukuran tekanan vakum</p>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
