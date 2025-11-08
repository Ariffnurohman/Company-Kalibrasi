@extends('layouts.app')

@section('content')

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

<section class="py-5">
  <div class="container">
    <h2 class="section-heading text-center mb-4">News & Update</h2>
    <div class="row g-4">
      <!-- Berita 1 -->
      <div class="col-md-4">
        <div class="card shadow-sm h-100">
          <img src="{{ asset('images/berita/bahan.jpeg') }}" class="card-img-top" alt="Berita 1">
          <div class="card-body">
            <h5 class="fw-bold">Training Kalibrasi PT. Fuji Seat Indonesia</h5>
            <p>Pelatihan kalibrasi peralatan ISO 17025 yang diikuti oleh teknisi dari berbagai daerah.</p>
            <a href="#" class="btn btn-primary btn-sm">Baca Selengkapnya</a>
          </div>
        </div>
      </div>
      <!-- Berita 2 -->
      <div class="col-md-4">
        <div class="card shadow-sm h-100">
          <img src="{{ asset('images/berita/pameran.png') }}" class="card-img-top" alt="Berita 2">
          <div class="card-body">
            <h5 class="fw-bold">Manufacturing Indonesia Series</h5>
            <p>Workshop pengenalan alat ukur kimia instrumental dengan praktek langsung.</p>
            <a href="#" class="btn btn-primary btn-sm">Baca Selengkapnya</a>
          </div>
        </div>
      </div>
      <!-- Berita 3 -->
      <div class="col-md-4">
        <div class="card shadow-sm h-100">
          <img src="{{ asset('images/berita/berita1.png') }}" class="card-img-top" alt="Berita 3">
          <div class="card-body">
            <h5 class="fw-bold">Sertifikasi Peserta</h5>
            <p>Peserta yang lulus pelatihan berhak mendapatkan sertifikat resmi dengan QR Code.</p>
            <a href="#" class="btn btn-primary btn-sm">Baca Selengkapnya</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
