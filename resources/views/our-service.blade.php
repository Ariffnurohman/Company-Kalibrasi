@extends('layouts.app')

@section('content')
<div class="container py-5">

    <div class="text-center mb-5">
        <h2 class="fw-bold">Our Services - Lingkup Kalibrasi</h2>
        <p class="text-muted">Pilih kategori untuk melihat detail layanan kalibrasi kami.</p>
    </div>

    <div class="row g-4">

        <!-- Dimensi -->
        <div class="col-md-3 text-center">
            <a href="{{ route('kalibrasi.dimensi') }}" class="service-card text-decoration-none">
                <i class="bi bi-rulers fs-1 text-primary"></i>
                <h5 class="fw-bold mt-2">Dimensi</h5>
                <p class="text-muted small">Outside Micrometer, Caliper, Thickness Gauge, dll</p>
            </a>
        </div>

        <!-- Massa -->
        <div class="col-md-3 text-center">
            <a href="{{ route('kalibrasi.massa') }}" class="service-card text-decoration-none">
                <i class="bi bi-basket2-fill fs-1 text-primary"></i>
                <h5 class="fw-bold mt-2">Massa</h5>
                <p class="text-muted small">Balance, Timbangan, dll</p>
            </a>
        </div>

        <!-- Suhu -->
        <div class="col-md-3 text-center">
            <a href="{{ route('kalibrasi.suhu') }}" class="service-card text-decoration-none">
                <i class="bi bi-thermometer-half fs-1 text-primary"></i>
                <h5 class="fw-bold mt-2">Suhu</h5>
                <p class="text-muted small">Waterbath, Oven, Furnace, dll</p>
            </a>
        </div>

        <!-- Tekanan -->
        <div class="col-md-3 text-center">
            <a href="{{ route('kalibrasi.tekanan') }}" class="service-card text-decoration-none">
                <i class="bi bi-speedometer2 fs-1 text-primary"></i>
                <h5 class="fw-bold mt-2">Tekanan</h5>
                <p class="text-muted small">Pressure Gauge, Transmitter, dll</p>
            </a>
        </div>

        <!-- Gaya -->
        <div class="col-md-3 text-center">
            <a href="{{ route('kalibrasi.gaya') }}" class="service-card text-decoration-none">
                <i class="bi bi-hammer fs-1 text-primary"></i>
                <h5 class="fw-bold mt-2">Gaya</h5>
                <p class="text-muted small">Push Pull Gauge, Torque Meter, dll</p>
            </a>
        </div>

        <!-- Kekerasan -->
        <div class="col-md-3 text-center">
            <a href="{{ route('kalibrasi.kekerasan') }}" class="service-card text-decoration-none">
                <i class="bi bi-grid-1x2-fill fs-1 text-primary"></i>
                <h5 class="fw-bold mt-2">Kekerasan</h5>
                <p class="text-muted small">Hardness Tester, Hardness Block</p>
            </a>
        </div>

        <!-- Volume -->
        <div class="col-md-3 text-center">
            <a href="{{ route('kalibrasi.volume') }}" class="service-card text-decoration-none">
                <i class="bi bi-cup-straw fs-1 text-primary"></i>
                <h5 class="fw-bold mt-2">Volume</h5>
                <p class="text-muted small">Buret, Pipet, Labu Ukur, dll</p>
            </a>
        </div>

        <!-- Waktu & Frekuensi -->
        <div class="col-md-3 text-center">
            <a href="{{ route('kalibrasi.waktu-frekuensi') }}" class="service-card text-decoration-none">
                <i class="bi bi-stopwatch-fill fs-1 text-primary"></i>
                <h5 class="fw-bold mt-2">Waktu & Frekuensi</h5>
                <p class="text-muted small">Stopwatch, Frequency Meter, Tachometer</p>
            </a>
        </div>

        <!-- Instrumen Analitik -->
        <div class="col-md-3 text-center">
            <a href="{{ route('kalibrasi.instrumen-analitik') }}" class="service-card text-decoration-none">
                <i class="bi bi-droplet-half fs-1 text-primary"></i>
                <h5 class="fw-bold mt-2">Instrumen Analitik</h5>
                <p class="text-muted small">pH Meter, Conductivity, Viscometer, dll</p>
            </a>
        </div>

    </div>
</div>

@endsection
