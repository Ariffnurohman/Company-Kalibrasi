@extends('layouts.app')



<!-- Hero / Header -->
<section class="service-hero text-white d-flex align-items-center justify-content-center">
  <div class="text-center">
    <h1 class="fw-bold">Layanan Kami</h1>
    <p>Kami menyediakan jasa kalibrasi, pelatihan, dan perawatan alat ukur dengan standar internasional</p>
  </div>
</section>

<!-- Layanan Section -->
<section id="services" class="py-5">
    <div class="text-center mb-5">
      <h2 class="section-heading">Apa yang Kami Tawarkan?</h2>
      <p class="text-muted">Berikut adalah layanan utama dari PT Rukun Sejahtera Teknik</p>
    </div>
    <div class="row g-4">

      <!-- Layanan 1 -->
      <div class="col-md-4 col-sm-6">
        <div class="card h-100 shadow-sm border-0 service-card">
          <div class="card-body text-center">
            <img src="{{ asset('images/icons/kalibrasi.png') }}" alt="Kalibrasi" class="mb-3" width="70">
            <h5 class="card-title fw-bold">Kalibrasi Alat Ukur</h5>
            <p class="card-text">Kami melayani kalibrasi alat ukur dengan standar ISO 17025 untuk memastikan akurasi dan keandalan.</p>
            <a href="#" class="btn btn-primary">Selengkapnya</a>
          </div>
        </div>
      </div>

      <!-- Layanan 2 -->
      <div class="col-md-4 col-sm-6">
        <div class="card h-100 shadow-sm border-0 service-card">
          <div class="card-body text-center">
            <img src="{{ asset('images/icons/pelatihan.png') }}" alt="Pelatihan" class="mb-3" width="70">
            <h5 class="card-title fw-bold">Pelatihan</h5>
            <p class="card-text">Program pelatihan untuk teknisi dan karyawan agar memahami cara penggunaan & pemeliharaan alat ukur.</p>
            <a href="#" class="btn btn-primary">Selengkapnya</a>
          </div>
        </div>
      </div>

      <!-- Layanan 3 -->
      <div class="col-md-4 col-sm-6">
        <div class="card h-100 shadow-sm border-0 service-card">
          <div class="card-body text-center">
            <img src="{{ asset('images/icons/perawatan.png') }}" alt="Perawatan" class="mb-3" width="70">
            <h5 class="card-title fw-bold">Perawatan & Service</h5>
            <p class="card-text">Kami memberikan layanan perawatan dan perbaikan alat ukur agar tetap optimal dan berfungsi dengan baik.</p>
            <a href="#" class="btn btn-primary">Selengkapnya</a>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

