@extends('layouts.app')

@section('content')
<style>
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
        height: 180px;
        width: 100%;
        object-fit: cover;
        background: #f0f2f5;
        border-bottom: 1px solid #e5e5e5;
        padding: 10px;
    }

    .calib-title {
        font-weight: 700;
        color: #0b3f9f;
    }
</style>

<div class="container py-5">
    <h2 class="text-center fw-bold" style="color:#0b3f9f;">Kalibrasi Massa</h2>
    <p class="text-center mb-4">Layanan kalibrasi untuk alat ukur massa dan timbangan.</p>

    <div class="row g-4">

        <!-- Item 1 – Timbangan Digital -->
        <div class="col-md-4">
            <div class="card calib-card shadow-sm">
                <img src="{{ asset('images/massa/timbangan-digital.jpg') }}" class="calib-img" alt="timbangan-digital">
                <div class="card-body">
                    <h5 class="calib-title">Timbangan Digital</h5>
                    <p class="text-muted small mb-1">• Kapasitas: 1 kg – 300 kg</p>
                    <p class="text-muted small mb-1">• Resolusi: 0.1 g – 10 g</p>
                    <p class="text-muted small">• Fungsi: Pengukuran berat benda industri & laboratorium</p>
                </div>
            </div>
        </div>

        <!-- Item 2 – Timbangan Meja -->
        <div class="col-md-4">
            <div class="card calib-card shadow-sm">
                <img src="{{ asset('images/massa/timbangan-meja.jpg') }}" class="calib-img" alt="timbangan-meja">
                <div class="card-body">
                    <h5 class="calib-title">Timbangan Meja</h5>
                    <p class="text-muted small mb-1">• Kapasitas: 5 kg – 60 kg</p>
                    <p class="text-muted small mb-1">• Resolusi: 1 g – 5 g</p>
                    <p class="text-muted small">• Fungsi: Penimbangan untuk produksi & pengepakan</p>
                </div>
            </div>
        </div>

        <!-- Item 3 – Anak Timbangan -->
        <div class="col-md-4">
            <div class="card calib-card shadow-sm">
                <img src="{{ asset('images/massa/anak-timbangan.jpg') }}" class="calib-img" alt="anak-timbangan">
                <div class="card-body">
                    <h5 class="calib-title">Anak Timbangan (Weight Set)</h5>
                    <p class="text-muted small mb-1">• Kelas: F1, F2, M1</p>
                    <p class="text-muted small mb-1">• Rentang: 1 mg – 20 kg</p>
                    <p class="text-muted small">• Fungsi: Standar acuan untuk kalibrasi timbangan</p>
                </div>
            </div>
        </div>

        <!-- Item 4 – Timbangan Analitik -->
        <div class="col-md-4">
            <div class="card calib-card shadow-sm">
                <img src="{{ asset('images/massa/timbangan-analitik.jpg') }}" class="calib-img" alt="timbangan-analitik">
                <div class="card-body">
                    <h5 class="calib-title">Timbangan Analitik</h5>
                    <p class="text-muted small mb-1">• Kapasitas: 200 g – 500 g</p>
                    <p class="text-muted small mb-1">• Resolusi: 0.1 mg – 1 mg</p>
                    <p class="text-muted small">• Fungsi: Pengukuran presisi laboratorium kimia/biologi</p>
                </div>
            </div>
        </div>

        <!-- Item 5 – Timbangan Gantung -->
        <div class="col-md-4">
            <div class="card calib-card shadow-sm">
                <img src="{{ asset('images/massa/timbangan-gantung.jpg') }}" class="calib-img" alt="timbangan-gantung">
                <div class="card-body">
                    <h5 class="calib-title">Timbangan Gantung</h5>
                    <p class="text-muted small mb-1">• Kapasitas: 50 kg – 5 ton</p>
                    <p class="text-muted small mb-1">• Resolusi: 10 g – 500 g</p>
                    <p class="text-muted small">• Fungsi: Penimbangan beban besar industri</p>
                </div>
            </div>
        </div>

        <!-- Item 6 – Timbangan Lantai -->
        <div class="col-md-4">
            <div class="card calib-card shadow-sm">
                <img src="{{ asset('images/massa/timbangan-lantai.jpg') }}" class="calib-img" alt="timbangan-lantai">
                <div class="card-body">
                    <h5 class="calib-title">Timbangan Lantai</h5>
                    <p class="text-muted small mb-1">• Kapasitas: 500 kg – 3 ton</p>
                    <p class="text-muted small mb-1">• Resolusi: 50 g – 500 g</p>
                    <p class="text-muted small">• Fungsi: Penimbangan barang besar di pabrik & gudang</p>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
