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
<section id="clients" class="py-5 bg-light">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="section-heading">Client Kami</h2>
      <p class="text-muted">Perusahaan & organisasi yang telah mempercayakan layanan kami</p>
    </div>

    <div class="row g-4">
    <div class="row g-4">
      @foreach (['kalbe-logo.png','totalpack-logo.png','magna-logo.png','marutake-logo.png', 'pt_tsh.png', 'logo-trix.png', 'fasi-logo.png', 'fuji-seat-logo.png' ] as $logo)
      <div class="col-6 col-md-3 text-center">
        <div class="client-card p-3 shadow-sm bg-white rounded">
          <img src="{{ asset('images/client/' . $logo) }}" alt="Client" class="img-fluid client-img">
        </div>
      </div>
      @endforeach
</section>

@endsection

