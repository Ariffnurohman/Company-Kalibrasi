@extends('layouts.app')

@section('content')

{{-- KALIBRASI VOLUME --}}
<div class="container py-5">
    <h2 class="text-center fw-bold" style="color:#1b5e20;">Kalibrasi Volume</h2>
    <p class="text-center mb-4">Layanan kalibrasi untuk alat ukur volume laboratorium.</p>

    <div class="row g-4">

        <!-- Gelas Ukur -->
        <div class="col-md-4">
            <div class="card calib-card shadow-sm">
                <img src="{{ asset('images/volume/gelas-ukur.jpg') }}" class="calib-img" alt="gelas-ukur">
                <div class="card-body">
                    <h5 class="calib-title">Gelas Ukur (Measuring Cylinder)</h5>
                    <p class="text-muted small mb-1">• Volume: 10 mL – 2000 mL</p>
                </div>
            </div>
        </div>

        <!-- Pipet Volume -->
        <div class="col-md-4">
            <div class="card calib-card shadow-sm">
                <img src="{{ asset('images/volume/pipet.jpg') }}" class="calib-img" alt="pipet">
                <div class="card-body">
                    <h5 class="calib-title">Pipet Volume</h5>
                    <p class="text-muted small mb-1">• Volume: 1 mL – 100 mL</p>
                </div>
            </div>
        </div>

        <!-- Burette -->
        <div class="col-md-4">
            <div class="card calib-card shadow-sm">
                <img src="{{ asset('images/volume/buret.jpg') }}" class="calib-img" alt="buret">
                <div class="card-body">
                    <h5 class="calib-title">Burette</h5>
                    <p class="text-muted small mb-1">• Volume: 10 mL – 100 mL</p>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection