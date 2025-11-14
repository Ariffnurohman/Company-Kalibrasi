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
        color: #b03000; /* warna khas suhu/thermal */
    }
</style>

<div class="container py-5">
    <h2 class="text-center fw-bold" style="color:#b03000;">Kalibrasi Suhu</h2>
    <p class="text-center mb-4">Layanan kalibrasi untuk alat ukur suhu dan peralatan termal.</p>

    <div class="row g-4">

        <!-- Item 1 – Thermometer Digital -->
        <div class="col-md-4">
            <div class="card calib-card shadow-sm">
                <img src="{{ asset('images/suhu/thermometer-digital.jpg') }}" class="calib-img" alt="thermometer-digital">
                <div class="card-body">
                    <h5 class="calib-title">Thermometer Digital</h5>
                    <p class="text-muted small mb-1">• Rentang: -50°C – 300°C</p>
                    <p class="text-muted small mb-1">• Resolusi: 0.1°C</p>
                    <p class="text-muted small">• Fungsi: Pengukuran suhu benda/ruangan secara digital</p>
                </div>
            </div>
        </div>

        <!-- Item 2 – Infrared Thermometer -->
        <div class="col-md-4">
            <div class="card calib-card shadow-sm">
                <img src="{{ asset('images/suhu/infrared-thermometer.jpg') }}" class="calib-img" alt="infrared-thermometer">
                <div class="card-body">
                    <h5 class="calib-title">Infrared Thermometer</h5>
                    <p class="text-muted small mb-1">• Rentang: -50°C – 600°C</p>
                    <p class="text-muted small mb-1">• Resolusi: 0.1°C</p>
                    <p class="text-muted small">• Fungsi: Mengukur suhu permukaan tanpa kontak</p>
                </div>
            </div>
        </div>

        <!-- Item 3 – Hygrometer / Thermo-Hygrometer -->
        <div class="col-md-4">
            <div class="card calib-card shadow-sm">
                <img src="{{ asset('images/suhu/thermo-hygrometer.jpg') }}" class="calib-img" alt="hygrometer">
                <div class="card-body">
                    <h5 class="calib-title">Thermo-Hygrometer</h5>
                    <p class="text-muted small mb-1">• Suhu: 0°C – 60°C</p>
                    <p class="text-muted small mb-1">• Kelembaban: 10% – 95% RH</p>
                    <p class="text-muted small">• Fungsi: Mengukur suhu & kelembaban ruangan</p>
                </div>
            </div>
        </div>

        <!-- Item 4 – Data Logger Suhu -->
        <div class="col-md-4">
            <div class="card calib-card shadow-sm">
                <img src="{{ asset('images/suhu/data-logger.jpg') }}" class="calib-img" alt="data-logger">
                <div class="card-body">
                    <h5 class="calib-title">Temperature Data Logger</h5>
                    <p class="text-muted small mb-1">• Rentang: -40°C – 85°C</p>
                    <p class="text-muted small mb-1">• Resolusi: 0.1°C</p>
                    <p class="text-muted small">• Fungsi: Monitoring suhu kontinu pada penyimpanan</p>
                </div>
            </div>
        </div>

        <!-- Item 5 – Thermocouple -->
        <div class="col-md-4">
            <div class="card calib-card shadow-sm">
                <img src="{{ asset('images/suhu/thermocouple.jpg') }}" class="calib-img" alt="thermocouple">
                <div class="card-body">
                    <h5 class="calib-title">Thermocouple</h5>
                    <p class="text-muted small mb-1">• Rentang: 0°C – 1200°C (Tergantung tipe)</p>
                    <p class="text-muted small mb-1">• Tipe: K, J, T, E</p>
                    <p class="text-muted small">• Fungsi: Pengukuran suhu proses industri</p>
                </div>
            </div>
        </div>

        <!-- Item 6 – RTD Sensor (PT100/PT1000) -->
        <div class="col-md-4">
            <div class="card calib-card shadow-sm">
                <img src="{{ asset('images/suhu/rtd-pt100.jpg') }}" class="calib-img" alt="rtd-pt100">
                <div class="card-body">
                    <h5 class="calib-title">RTD Sensor (PT100/PT1000)</h5>
                    <p class="text-muted small mb-1">• Rentang: -200°C – 650°C</p>
                    <p class="text-muted small mb-1">• Tipe: 2 Wire, 3 Wire, 4 Wire</p>
                    <p class="text-muted small">• Fungsi: Pengukuran suhu presisi tinggi</p>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
