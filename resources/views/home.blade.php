@extends('layouts.app')

<!-- Hero Section -->
<div id="heroCarousel" class="carousel slide mt-6" data-aos="zoom-in" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{ asset('images/hero1.png') }}" class="d-block w-100 img-fluid" alt="Hero 1">
    </div>
    <div class="carousel-item">
      <img src="{{ asset('images/hero1.png') }}" class="d-block w-100 img-fluid" alt="Hero 2">
    </div>
    <div class="carousel-item">
      <img src="{{ asset('images/hero1.png') }}" class="d-block w-100 img-fluid" alt="Hero 3">
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

<!-- Portfolio Section -->
<section id="portfolio" class="py-5 " data-aos="fade-up">
  <div class="container">
    <div class="row g-5">

      <!-- Card 1 -->
      <div class="col-md-4 col-sm-6 col-12 mb-4">
        <div class="card shadow-sm border-0">
          <img src="{{ asset('images/gallery/kalibrasi1.jpg') }}" class="card-img-top img-fluid" alt="Kalibrasi">
        </div>
        <div class="portfolio-caption bg-blue p-3 rounded">
          <h4>KALIBRASI</h4>
          <p>
            Peralatan Ukur Besaran Massa, Volume, Instrumental Kimia, Gaya, Suhu,
            Kelistrikan, Dimensi, Tekanan. Contoh alat ukur: Tangki/Storage Tank, Belt Conveyor,
            Flow Meter, Rotameter, Jembatan Timbang, Hammer Crusher, Rotary Sample Divider (RSD), dll.
          </p>
          <a href="{{ url('/layanan') }}" class="btn btn-primary mt-2">Selengkapnya</a>
        </div>
      </div>

      <!-- Card 2 -->
      <div class="col-md-4 col-sm-6 col-12 mb-4">
        <div class="card shadow-sm border-0">
          <img src="{{ asset('images/gallery/kalibrasi2.jpg') }}" class="card-img-top img-fluid" alt="Alat Ukur">
        </div>
        <div class="portfolio-caption bg-blue p-3 rounded">
          <h4>ALAT UKUR</h4>
          <p>
            Peralatan Ukur Besaran Massa, Volume, Instrumental Kimia, Gaya, Suhu,
            Kelistrikan, Dimensi, Tekanan. Contoh alat ukur: Tangki/Storage Tank, Belt Conveyor,
            Flow Meter, Rotameter, Jembatan Timbang, Hammer Crusher, Rotary Sample Divider (RSD), dll.
          </p>
          <a href="{{ url('/layanan') }}" class="btn btn-primary mt-2">Selengkapnya</a>
        </div>
      </div>

      <!-- Card 3 -->
      <div class="col-md-4 col-sm-6 col-12 mb-4">
        <div class="card shadow-sm border-0">
          <img src="{{ asset('images/gallery/kalibrasi3.png') }}" class="card-img-top img-fluid" alt="Pelatihan">
        </div>
        <div class="portfolio-caption bg-blue p-3 rounded">
          <h4>PELATIHAN</h4>
          <p>
            Peralatan Ukur Besaran Massa, Volume, Instrumental Kimia, Gaya, Suhu,
            Kelistrikan, Dimensi, Tekanan. Contoh alat ukur: Tangki/Storage Tank, Belt Conveyor,
            Flow Meter, Rotameter, Jembatan Timbang, Hammer Crusher, Rotary Sample Divider (RSD), dll.
          </p>
          <a href="{{ url('/layanan') }}" class="btn btn-primary mt-2">Selengkapnya</a>
        </div>
      </div>

    </div>
  </div>
</section>



<!-- About Section -->
<section id="about" class="py-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="card shadow-lg border-0 rounded-3 p-4">
          <div class="row align-items-center">

            <!-- Gambar -->
            <div class="col-md-5 mb-3 mb-md-0">
              <img src="{{ asset('images/berita/berita2.png') }}"
                alt="Tentang Kami"
                class="img-fluid rounded shadow-sm">
            </div>

            <!-- Teks -->
            <div class="col-md-7">
              <h3 class="text-primary fw-bold mb-3 text-center text-md-start">
                RUKUN CALIBRATION LABORATORY
              </h3>
              <p class="text-dark text-justify">
                PT Rukun Calibration Laboratory adalah perusahaan jasa kalibrasi peralatan ukur dan pelatihan
                yang berfokus melayani pelanggan dalam memenuhi semua permintaan kalibrasi peralatan ukur
                dan pelatihan dengan mengutamakan kepuasan pelanggan. Kami berkomitmen menyediakan jasa kalibrasi
                peralatan ukur dan pelatihan yang profesional, edukatif, informatif, handal dan terbarukan
                dengan biaya terendah dan kualitas tertinggi, serta memberikan jaminan kepercayaan kepada semua pelanggan.
              </p>
              <div class="text-center text-md-start mt-3">
                <a href="{{ url('/tentang-kami') }}" class="btn btn-primary">Selengkapnya</a>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<div class="container py-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold">Our Services - Lingkup Kalibrasi</h2>
        <p class="text-muted">Pilih kategori untuk melihat detail layanan kalibrasi kami.</p>
    </div>

    <div class="row g-4">
        <!-- Dimensi -->
        <div class="col-md-3 text-center">
            <a href="{{ route('kalibrasi.dimensi') }}" class="text-decoration-none text-dark">
                <i class="bi bi-rulers fs-1 text-primary" ></i>
                <h5 class="fw-bold mt-2">Dimensi</h5>
                <p class="text-muted small">Outside Micrometer, Caliper, Thickness Gauge, dll</p>
            </a>
        </div>

        <!-- Massa -->
        <div class="col-md-3 text-center">
            <a href="{{ route('kalibrasi.massa') }}" class="text-decoration-none text-dark">
                <i class="bi bi-basket2-fill fs-1 text-primary"></i>
                <h5 class="fw-bold mt-2">Massa</h5>
                <p class="text-muted small">Balance (electronic, mechanic), Timbangan, dll</p>
            </a>
        </div>

        <!-- Suhu -->
        <div class="col-md-3 text-center">
            <a href="{{ route('kalibrasi.suhu') }}" class="text-decoration-none text-dark">
                <i class="bi bi-thermometer-half fs-1 text-primary"></i>
                <h5 class="fw-bold mt-2">Suhu</h5>
                <p class="text-muted small">Waterbath, Oven, Furnace, dll</p>
            </a>
        </div>

        <!-- Tekanan -->
        <div class="col-md-3 text-center">
            <a href="{{ route('kalibrasi.tekanan') }}" class="text-decoration-none text-dark">
                <i class="bi bi-speedometer2 fs-1 text-primary"></i>
                <h5 class="fw-bold mt-2">Tekanan</h5>
                <p class="text-muted small">Pressure Gauge, Transmitter, Pneumatic, dll</p>
            </a>
        </div>

        <!-- Gaya -->
        <div class="col-md-3 text-center">
            <a href="{{ route('kalibrasi.gaya') }}" class="text-decoration-none text-dark">
                <i class="bi bi-hammer fs-1 text-primary"></i>
                <h5 class="fw-bold mt-2">Gaya</h5>
                <p class="text-muted small">Push Pull Gauge, Torque Meter, dll</p>
            </a>
        </div>

        <!-- Kekerasan -->
        <div class="col-md-3 text-center">
            <a href="{{ route('kalibrasi.kekerasan') }}" class="text-decoration-none text-dark">
                <i class="bi bi-grid-1x2-fill fs-1 text-primary"></i>
                <h5 class="fw-bold mt-2">Kekerasan</h5>
                <p class="text-muted small">Hardness Tester, Hardness Block, Durometer</p>
            </a>
        </div>

        <!-- Volume -->
        <div class="col-md-3 text-center">
            <a href="{{ route('kalibrasi.volume') }}" class="text-decoration-none text-dark">
                <i class="bi bi-cup-straw fs-1 text-primary"></i>
                <h5 class="fw-bold mt-2">Volume</h5>
                <p class="text-muted small">Buret, Pipet Volume, Labu Ukur, Gelas Ukur</p>
            </a>
        </div>

        <!-- Waktu & Frekuensi -->
        <div class="col-md-3 text-center">
            <a href="{{ route('kalibrasi.waktu-frekuensi') }}" class="text-decoration-none text-dark">
                <i class="bi bi-stopwatch-fill fs-1 text-primary"></i>
                <h5 class="fw-bold mt-2">Waktu & Frekuensi</h5>
                <p class="text-muted small">Stopwatch, Frequency Meter, Tachometer</p>
            </a>
        </div>

        <!-- Instrumen Analitik -->
        <div class="col-md-3 text-center">
            <a href="{{ route('kalibrasi.instrumen-analitik') }}" class="text-decoration-none text-dark">
                <i class="bi bi-droplet-half fs-1 text-primary"></i>
                <h5 class="fw-bold mt-2">Instrumen Analitik</h5>
                <p class="text-muted small">pH Meter, Conductivity, Viscometer, dll</p>
            </a>
        </div>
    </div>
</div>

<!-- News Section -->
<section id="berita" class="py-5">
  <div class="container">
    <div class="text-center mb-4">
      <h2 class="section-heading">Berita Terbaru</h2>
      <p class="text-muted">Update informasi & kegiatan terbaru</p>
    </div>
    <div class="row g-4">
      @foreach (['berita1.png' => 'Pelatihan Kalibrasi Alat Ukur', 'berita2.png' => 'Workshop Instrumental Kimia', 'berita3.png' => 'Sertifikasi Peserta'] as $img => $title)
      <div class="col-md-4">
        <div class="news-card shadow rounded overflow-hidden">
          <img src="{{ asset('images/berita/' . $img) }}" alt="{{ $title }}" class="news-img w-100">
          <div class="news-body p-3">
            <h5 class="news-title">{{ $title }}</h5>
            <p class="news-text">Deskripsi singkat kegiatan terkait {{ strtolower($title) }}.</p>
            <a href="#" class="btn btn-sm btn-primary">Baca Selengkapnya</a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<!-- Clients Section -->
<section id="clients" class="py-5">
  <div class="container">
    <div class="text-center mb-4">
      <h2 class="section-heading">Client Kami</h2>
      <p class="text-muted">Perusahaan dan organisasi yang telah bekerja sama dengan kami</p>
    </div>
    <div class="row g-4">
      @foreach (['kalbe-logo.png','totalpack-logo.png','magna-logo.png','marutake-logo.png', 'pt_tsh.png', 'logo-trix.png', 'fasi-logo.png'] as $logo)
      <div class="col-6 col-md-3 text-center">
        <div class="client-card p-3 shadow-sm bg-white rounded">
          <img src="{{ asset('images/client/' . $logo) }}" alt="Client" class="img-fluid client-img">
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>



