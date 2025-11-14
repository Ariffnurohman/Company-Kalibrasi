@extends('layouts.app')

@section('content')
{{-- KALIBRASI GAYA --}}
<div class="container py-5">
    <h2 class="text-center fw-bold" style="color:#5a2ca0;">Kalibrasi Gaya (Force)</h2>
    <p class="text-center mb-4">Layanan kalibrasi alat ukur gaya dan gaya tekan/tarik.</p>

    <div class="row g-4">

        <!-- Force Gauge -->
        <div class="col-md-4">
            <div class="card calib-card shadow-sm">
                <img src="{{ asset('images/gaya/force-gauge.jpg') }}" class="calib-img" alt="force-gauge">
                <div class="card-body">
                    <h5 class="calib-title">Force Gauge</h5>
                    <p class="text-muted small mb-1">• Rentang: 0 – 5000 N</p>
                    <p class="text-muted small mb-1">• Tipe: Analog/Digital</p>
                    <p class="text-muted small">• Fungsi: Pengukuran gaya tekan & tarik</p>
                </div>
            </div>
        </div>

        <!-- UTM Machine -->
        <div class="col-md-4">
            <div class="card calib-card shadow-sm">
                <img src="{{ asset('images/gaya/utm.jpg') }}" class="calib-img" alt="utm">
                <div class="card-body">
                    <h5 class="calib-title">Universal Testing Machine</h5>
                    <p class="text-muted small mb-1">• Kapasitas: 1 – 100 Ton</p>
                    <p class="text-muted small mb-1">• Fungsi: Tensile, compression & bending</p>
                </div>
            </div>
        </div>

        <!-- Load Cell -->
        <div class="col-md-4">
            <div class="card calib-card shadow-sm">
                <img src="{{ asset('images/gaya/load-cell.jpg') }}" class="calib-img" alt="load-cell">
                <div class="card-body">
                    <h5 class="calib-title">Load Cell</h5>
                    <p class="text-muted small mb-1">• Kapasitas: 10 kg – 50 Ton</p>
                    <p class="text-muted small mb-1">• Tipe: S-type, Beam, Pancake</p>
                    <p class="text-muted small">• Fungsi: Sensor gaya pada mesin industri</p>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
