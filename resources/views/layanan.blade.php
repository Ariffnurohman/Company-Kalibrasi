@extends('layouts.app')

<!-- Hero Section -->
<div id="heroCarousel" class="carousel slide mt-6" data-aos="zoom-in" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{ asset('images/banner/banner1.png') }}" class="d-block w-100 img-fluid" alt="Hero 1">
    </div>
    <div class="carousel-item">
      <img src="{{ asset('images/banner/banner2.png') }}" class="d-block w-100 img-fluid" alt="Hero 2">
    </div>
    <div class="carousel-item">
      <img src="{{ asset('images/banner/banner3.png') }}" class="d-block w-100 img-fluid" alt="Hero 3">
    </div>
  </div>
  <!-- Tombol navigasi -->
  <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>

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
            <img src="{{ asset('images/icons/icon1.png') }}" alt="Kalibrasi" class="mb-3" width="70">
            <h5 class="card-title fw-bold">Kalibrasi Alat Ukur</h5>
            <p class="card-text">Kami melayani kalibrasi alat ukur dengan standar ISO 17025 untuk memastikan akurasi dan keandalan.</p>
            <a href="our-service" class="btn btn-primary">Selengkapnya</a>
          </div>
        </div>
      </div>

      <!-- Layanan 2 -->
      <div class="col-md-4 col-sm-6">
        <div class="card h-100 shadow-sm border-0 service-card">
          <div class="card-body text-center">
            <img src="{{ asset('images/icons/icon2.png') }}" alt="Pelatihan" class="mb-3" width="70">
            <h5 class="card-title fw-bold">Pelatihan</h5>
            <p class="card-text">Program pelatihan untuk teknisi dan karyawan agar memahami cara penggunaan & pemeliharaan alat ukur.</p>
            <a href="pelatihan" class="btn btn-primary">Selengkapnya</a>
          </div>
        </div>
      </div>

      <!-- Layanan 3 -->
      <div class="col-md-4 col-sm-6">
        <div class="card h-100 shadow-sm border-0 service-card">
          <div class="card-body text-center">
            <img src="{{ asset('images/icons/icon3.png') }}" alt="Perawatan" class="mb-3" width="70">
            <h5 class="card-title fw-bold">Perawatan & Service</h5>
            <p class="card-text">Kami memberikan layanan perawatan dan perbaikan alat ukur agar tetap optimal dan berfungsi dengan baik.</p>
            <a href="#" class="btn btn-primary">Selengkapnya</a>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

