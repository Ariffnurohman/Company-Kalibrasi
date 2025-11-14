@extends('layouts.app')

@section('content')


{{-- KALIBRASI WAKTU --}}
<div class="container py-5">
    <h2 class="text-center fw-bold" style="color:#003366;">Kalibrasi Waktu & Frekuensi</h2>
    <p class="text-center mb-4">Layanan kalibrasi untuk alat ukur waktu, frekuensi, dan speed.</p>

    <div class="row g-4">

        <!-- Stopwatch -->
        <div class="col-md-4">
            <div class="card calib-card shadow-sm">
                <img src="{{ asset('images/waktu/stopwatch.jpg') }}" class="calib-img" alt="stopwatch">
                <div class="card-body">
                    <h5 class="calib-title">Stopwatch</h5>
                    <p class="text-muted small mb-1">• Resolusi: 0.01 – 1 sec</p>
                    <p class="text-muted small">• Fungsi: Pengukur waktu manual</p>
                </div>
            </div>
        </div>

        <!-- Tachometer -->
        <div class="col-md-4">
            <div class="card calib-card shadow-sm">
                <img src="{{ asset('images/waktu/tachometer.jpg') }}" class="calib-img" alt="tachometer">
                <div class="card-body">
                    <h5 class="calib-title">Tachometer</h5>
                    <p class="text-muted small mb-1">• Rentang: 0 – 100,000 RPM</p>
                    <p class="text-muted small">• Fungsi: Pengukuran putaran mesin</p>
                </div>
            </div>
        </div>

        <!-- Frequency Counter -->
        <div class="col-md-4">
            <div class="card calib-card shadow-sm">
                <img src="{{ asset('images/waktu/frequency.jpg') }}" class="calib-img" alt="frequency-counter">
                <div class="card-body">
                    <h5 class="calib-title">Frequency Counter</h5>
                    <p class="text-muted small mb-1">• Rentang: Hz – GHz</p>
                    <p class="text-muted small">• Fungsi: Pengukuran frekuensi elektronik</p>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection