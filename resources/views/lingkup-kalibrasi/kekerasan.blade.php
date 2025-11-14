@extends('layouts.app')

@section('content')

{{-- KALIBRASI KEKERASAN --}}
<div class="container py-5">
    <h2 class="text-center fw-bold" style="color:#8b0000;">Kalibrasi Kekerasan</h2>
    <p class="text-center mb-4">Layanan kalibrasi alat uji kekerasan material.</p>

    <div class="row g-4">

        <!-- Hardness Tester Rockwell -->
        <div class="col-md-4">
            <div class="card calib-card shadow-sm">
                <img src="{{ asset('images/kekerasan/rockwell.jpg') }}" class="calib-img" alt="rockwell">
                <div class="card-body">
                    <h5 class="calib-title">Rockwell Hardness Tester</h5>
                    <p class="text-muted small mb-1">• Skala: HRA, HRB, HRC</p>
                    <p class="text-muted small mb-1">• Fungsi: Uji kekerasan logam</p>
                </div>
            </div>
        </div>

        <!-- Hardness Vickers -->
        <div class="col-md-4">
            <div class="card calib-card shadow-sm">
                <img src="{{ asset('images/kekerasan/vickers.jpg') }}" class="calib-img" alt="vickers">
                <div class="card-body">
                    <h5 class="calib-title">Vickers Hardness Tester</h5>
                    <p class="text-muted small mb-1">• Beban: 1 – 100 kgf</p>
                    <p class="text-muted small mb-1">• Fungsi: Uji kekerasan mikro & makro</p>
                </div>
            </div>
        </div>

        <!-- Hardness Shore Durometer -->
        <div class="col-md-4">
            <div class="card calib-card shadow-sm">
                <img src="{{ asset('images/kekerasan/shore.jpg') }}" class="calib-img" alt="shore">
                <div class="card-body">
                    <h5 class="calib-title">Shore Hardness (A & D)</h5>
                    <p class="text-muted small mb-1">• Tipe: Shore A, Shore D</p>
                    <p class="text-muted small mb-1">• Fungsi: Uji kekerasan karet & plastik</p>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection