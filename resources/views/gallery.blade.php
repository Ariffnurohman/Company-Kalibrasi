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

@section('content')
<section id="gallery" class="py-5 bg-light">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="section-heading">Gallery Alat Kalibrasi</h2>
      <p class="text-muted">Dokumentasi alat ukur & kegiatan kalibrasi</p>
    </div>

    <div class="row g-4">
      <!-- Gambar 1 -->
      <div class="col-md-4 col-sm-6">
        <div class="gallery-card shadow-sm rounded overflow-hidden">
          <img src="{{ asset('images/gallery/alat1.jpg') }}" class="img-fluid w-100" alt="Alat 1">
          <div class="gallery-caption p-3 bg-white">
            <h6 class="fw-bold">Timbangan Digital</h6>
            <p class="small text-muted">Proses kalibrasi timbangan digital skala industri.</p>
          </div>
        </div>
      </div>

      <!-- Gambar 2 -->
      <div class="col-md-4 col-sm-6">
        <div class="gallery-card shadow-sm rounded overflow-hidden">
          <img src="{{ asset('images/gallery/alat2.jpg') }}" class="img-fluid w-100" alt="Alat 2">
          <div class="gallery-caption p-3 bg-white">
            <h6 class="fw-bold">Flow Meter</h6>
            <p class="small text-muted">Kalibrasi flow meter untuk memastikan akurasi aliran cairan.</p>
          </div>
        </div>
      </div>

      <!-- Gambar 3 -->
      <div class="col-md-4 col-sm-6">
        <div class="gallery-card shadow-sm rounded overflow-hidden">
          <img src="{{ asset('images/gallery/alat3.jpg') }}" class="img-fluid w-100" alt="Alat 3">
          <div class="gallery-caption p-3 bg-white">
            <h6 class="fw-bold">Alat Ukur Suhu</h6>
            <p class="small text-muted">Kalibrasi alat ukur suhu untuk laboratorium.</p>
          </div>
        </div>
      </div>

      <!-- Tambahkan lebih banyak gambar sesuai kebutuhan -->
    </div>
  </div>
</section>
@endsection
