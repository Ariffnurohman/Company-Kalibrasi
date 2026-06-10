@extends('layouts.app')

@section('content')
<style>
  .hover-animate {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }
  .hover-animate:hover {
    transform: translateY(-5px);
    box-shadow: 0 1rem 3rem rgba(0,0,0,.155) !important;
  }
  .carousel-overlay {
    position: absolute;
    top: 0; right: 0; bottom: 0; left: 0;
    background: linear-gradient(to bottom, rgba(0,0,0,0.2), rgba(0,0,0,0.6));
    z-index: 1;
  }
  .carousel-caption {
    z-index: 2;
    bottom: 25%;
  }
  .client-img {
    filter: grayscale(100%);
    opacity: 0.6;
    transition: all 0.3s ease;
    max-height: 60px;
    object-fit: contain;
  }
  .client-card:hover .client-img {
    filter: grayscale(0%);
    opacity: 1;
  }
  .text-justify {
    text-align: justify;
  }
</style>

<div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active" style="max-height: 550px;">
      <div class="carousel-overlay"></div>
      <img src="{{ asset('images/banner/banner1.png') }}" class="d-block w-100 img-fluid object-cover" alt="Hero 1">
      <div class="carousel-caption d-none d-md-block text-start container">
        <span class="badge bg-primary mb-2 px-3 py-2 text-uppercase fw-semibold">Akrab & Profesional</span>
        <h1 class="display-4 fw-bold text-white">Layanan Kalibrasi Akurat</h1>
        <p class="lead text-white-50">Menjamin ketertelusuran standar pengukuran Anda dengan kualitas tertinggi.</p>
      </div>
    </div>
    <div class="carousel-item" style="max-height: 550px;">
      <div class="carousel-overlay"></div>
      <img src="{{ asset('images/banner/banner2.png') }}" class="d-block w-100 img-fluid object-cover" alt="Hero 2">
      <div class="carousel-caption d-none d-md-block text-start container">
        <span class="badge bg-primary mb-2 px-3 py-2 text-uppercase fw-semibold">Standar Mutu Tinggi</span>
        <h1 class="display-4 fw-bold text-white">Pengadaan Alat Ukur</h1>
        <p class="lead text-white-50">Menyediakan solusi instrumentasi industri terbaik dan terkalibrasi.</p>
      </div>
    </div>
    <div class="carousel-item" style="max-height: 550px;">
      <div class="carousel-overlay"></div>
      <img src="{{ asset('images/banner/banner3.png') }}" class="d-block w-100 img-fluid object-cover" alt="Hero 3">
      <div class="carousel-caption d-none d-md-block text-start container">
        <span class="badge bg-primary mb-2 px-3 py-2 text-uppercase fw-semibold">Kompetensi Teruji</span>
        <h1 class="display-4 fw-bold text-white">Pelatihan & Sertifikasi</h1>
        <p class="lead text-white-50">Tingkatkan kapabilitas SDM Anda bersama para instruktur ahli teruji.</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<section id="portfolio" class="py-5" data-aos="fade-up">
  <div class="container py-4">
    <div class="text-center mb-5">
      <span class="text-primary text-uppercase fw-bold tracking-wider">Layanan Utama</span>
      <h2 class="fw-bold mt-2">Solusi Integrasi Kalibrasi & Industri</h2>
      <p class="text-muted mx-auto" style="max-width: 600px;">Kami hadir untuk memenuhi segala kebutuhan akurasi instrumen dan kompetensi teknis perusahaan Anda.</p>
    </div>

    <div class="row g-4">
      <div class="col-md-4">
        <div class="card h-100 shadow-sm border-0 hover-animate">
          <img src="{{ asset('images/gallery/kalibrasi1.jpg') }}" class="card-img-top" alt="Kalibrasi" style="height: 220px; object-fit: cover;">
          <div class="card-body p-4">
            <h4 class="fw-bold text-dark mb-3">KALIBRASI</h4>
            <p class="text-muted small">
              Jasa kalibrasi presisi untuk peralatan ukur Massa, Volume, Instrumen Kimia, Gaya, Suhu, Kelistrikan, Dimensi, hingga Tekanan untuk kepatuhan standar mutu tinggi.
            </p>
          </div>
          <div class="card-footer bg-transparent border-0 p-4 pt-0">
            <a href="{{ url('/layanan') }}" class="btn btn-outline-primary w-100">Selengkapnya</a>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card h-100 shadow-sm border-0 hover-animate">
          <img src="{{ asset('images/gallery/kalibrasi2.jpg') }}" class="card-img-top" alt="Alat Ukur" style="height: 220px; object-fit: cover;">
          <div class="card-body p-4">
            <h4 class="fw-bold text-dark mb-3">ALAT UKUR</h4>
            <p class="text-muted small">
              Penyediaan instrumen industri bersertifikasi seperti Storage Tank, Belt Conveyor, Flow Meter, Rotameter, Jembatan Timbang, hingga Rotary Sample Divider (RSD).
            </p>
          </div>
          <div class="card-footer bg-transparent border-0 p-4 pt-0">
            <a href="{{ url('/layanan') }}" class="btn btn-outline-primary w-100">Selengkapnya</a>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card h-100 shadow-sm border-0 hover-animate">
          <img src="{{ asset('images/gallery/kalibrasi3.png') }}" class="card-img-top" alt="Pelatihan" style="height: 220px; object-fit: cover;">
          <div class="card-body p-4">
            <h4 class="fw-bold text-dark mb-3">PELATIHAN</h4>
            <p class="text-muted small">
              Program pelatihan teknik kalibrasi, pengoperasian alat, serta pemahaman regulasi ISO demi melahirkan personel laboratorium yang andal dan kompeten.
            </p>
          </div>
          <div class="card-footer bg-transparent border-0 p-4 pt-0">
            <a href="{{ url('/pelatihan') }}" class="btn btn-outline-primary w-100">Selengkapnya</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="about" class="py-5 bg-light">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-11">
        <div class="card shadow-sm border-0 rounded-4 p-4 p-lg-5 bg-white">
          <div class="row align-items-center g-4">
            <div class="col-md-5">
              <img src="{{ asset('images/berita/berita2.png') }}" alt="Tentang Kami" class="img-fluid rounded shadow-sm w-100" style="object-fit: cover; max-height: 320px;">
            </div>
            <div class="col-md-7">
              <span class="text-primary text-uppercase fw-bold tracking-wider small">Profil Perusahaan</span>
              <h3 class="text-dark fw-bold my-3 text-center text-md-start">
                RUKUN CALIBRATION LABORATORY
              </h3>
              <p class="text-muted text-justify lh-lg mb-4">
                PT Rukun Calibration Laboratory adalah perusahaan jasa kalibrasi peralatan ukur dan pelatihan yang berfokus melayani pelanggan dalam memenuhi semua permintaan regulasi dengan mengutamakan kepuasan pelanggan. Kami berkomitmen menyediakan jasa profesional, edukatif, informatif, andal, dan terbarukan dengan efisiensi biaya serta kualitas tertinggi.
              </p>
              <div class="text-center text-md-start">
                <a href="{{ url('/about') }}" class="btn btn-primary px-4 py-2">Pelajari Selengkapnya</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="services" class="py-5">
  <div class="container py-4">
    <div class="text-center mb-5">
      <span class="text-primary text-uppercase fw-bold tracking-wider">Our Services</span>
      <h2 class="fw-bold mt-2">Lingkup Kategori Kalibrasi</h2>
      <p class="text-muted">Pilih kategori untuk melihat detail spesifikasi dan cakupan pengujian kami.</p>
    </div>

    <div class="row g-4 justify-content-center">
      <div class="col-lg-4 col-md-6">
        <a href="{{ route('kalibrasi.dimensi') }}" class="text-decoration-none text-dark d-block p-4 border rounded shadow-sm text-center bg-white h-100 hover-animate">
          <i class="bi bi-rulers fs-1 text-primary mb-3 d-inline-block"></i>
          <h5 class="fw-bold mb-2">Dimensi</h5>
          <p class="text-muted small mb-0">Outside Micrometer, Caliper, Thickness Gauge, dll.</p>
        </a>
      </div>

      <div class="col-lg-4 col-md-6">
        <a href="{{ route('kalibrasi.massa') }}" class="text-decoration-none text-dark d-block p-4 border rounded shadow-sm text-center bg-white h-100 hover-animate">
          <i class="bi bi-basket2-fill fs-1 text-primary mb-3 d-inline-block"></i>
          <h5 class="fw-bold mb-2">Massa</h5>
          <p class="text-muted small mb-0">Balance (electronic, mechanic), Timbangan, dll.</p>
        </a>
      </div>

      <div class="col-lg-4 col-md-6">
        <a href="{{ route('kalibrasi.suhu') }}" class="text-decoration-none text-dark d-block p-4 border rounded shadow-sm text-center bg-white h-100 hover-animate">
          <i class="bi bi-thermometer-half fs-1 text-primary mb-3 d-inline-block"></i>
          <h5 class="fw-bold mb-2">Suhu</h5>
          <p class="text-muted small mb-0">Waterbath, Oven, Furnace, Temperature Controller, dll.</p>
        </a>
      </div>

      <div class="col-lg-4 col-md-6">
        <a href="{{ route('kalibrasi.tekanan') }}" class="text-decoration-none text-dark d-block p-4 border rounded shadow-sm text-center bg-white h-100 hover-animate">
          <i class="bi bi-speedometer2 fs-1 text-primary mb-3 d-inline-block"></i>
          <h5 class="fw-bold mb-2">Tekanan</h5>
          <p class="text-muted small mb-0">Pressure Gauge, Transmitter, Pneumatic System, dll.</p>
        </a>
      </div>

      <div class="col-lg-4 col-md-6">
        <a href="{{ route('kalibrasi.gaya') }}" class="text-decoration-none text-dark d-block p-4 border rounded shadow-sm text-center bg-white h-100 hover-animate">
          <i class="bi bi-hammer fs-1 text-primary mb-3 d-inline-block"></i>
          <h5 class="fw-bold mb-2">Gaya</h5>
          <p class="text-muted small mb-0">Push Pull Gauge, Torque Meter, Load Cell, dll.</p>
        </a>
      </div>

      <div class="col-lg-4 col-md-6">
        <a href="{{ route('kalibrasi.kekerasan') }}" class="text-decoration-none text-dark d-block p-4 border rounded shadow-sm text-center bg-white h-100 hover-animate">
          <i class="bi bi-grid-1x2-fill fs-1 text-primary mb-3 d-inline-block"></i>
          <h5 class="fw-bold mb-2">Kekerasan</h5>
          <p class="text-muted small mb-0">Hardness Tester, Hardness Block, Durometer.</p>
        </a>
      </div>

      <div class="col-lg-4 col-md-6">
        <a href="{{ route('kalibrasi.volume') }}" class="text-decoration-none text-dark d-block p-4 border rounded shadow-sm text-center bg-white h-100 hover-animate">
          <i class="bi bi-cup-straw fs-1 text-primary mb-3 d-inline-block"></i>
          <h5 class="fw-bold mb-2">Volume</h5>
          <p class="text-muted small mb-0">Buret, Pipet Volume, Labu Ukur, Gelas Ukur.</p>
        </a>
      </div>

      <div class="col-lg-4 col-md-6">
        <a href="{{ route('kalibrasi.waktu-frekuensi') }}" class="text-decoration-none text-dark d-block p-4 border rounded shadow-sm text-center bg-white h-100 hover-animate">
          <i class="bi bi-stopwatch-fill fs-1 text-primary mb-3 d-inline-block"></i>
          <h5 class="fw-bold mb-2">Waktu & Frekuensi</h5>
          <p class="text-muted small mb-0">Stopwatch, Frequency Meter, Tachometer.</p>
        </a>
      </div>

      <div class="col-lg-4 col-md-6">
        <a href="{{ route('kalibrasi.instrumen-analitik') }}" class="text-decoration-none text-dark d-block p-4 border rounded shadow-sm text-center bg-white h-100 hover-animate">
          <i class="bi bi-droplet-half fs-1 text-primary mb-3 d-inline-block"></i>
          <h5 class="fw-bold mb-2">Instrumen Analitik</h5>
          <p class="text-muted small mb-0">pH Meter, Conductivity Meter, Viscometer, dll.</p>
        </a>
      </div>
    </div>
  </div>
</section>

<section id="berita" class="py-5 bg-light">
  <div class="container">
    <div class="text-center mb-5">
      <span class="text-primary text-uppercase fw-bold tracking-wider">Pusat Informasi</span>
      <h2 class="fw-bold mt-2">Berita & Kegiatan Terbaru</h2>
      <p class="text-muted">Ikuti pembaruan seputar dunia metrologi dan aktivitas kami</p>
    </div>
    <div class="row g-4">
      @foreach (['berita1.png' => 'Pelatihan Kalibrasi Alat Ukur', 'berita2.png' => 'Workshop Instrumental Kimia', 'berita3.png' => 'Sertifikasi Peserta'] as $img => $title)
      <div class="col-md-4">
        <div class="card h-100 border-0 shadow-sm hover-animate overflow-hidden">
          <img src="{{ asset('images/berita/' . $img) }}" alt="{{ $title }}" class="w-100" style="height: 200px; object-fit: cover;">
          <div class="card-body p-4">
            <h5 class="fw-bold mb-2 text-dark">{{ $title }}</h5>
            <p class="text-muted small">Deskripsi singkat mengenai pelaksanaan kegiatan {{ strtolower($title) }} demi menunjang efisiensi operasional.</p>
          </div>
          <div class="card-footer bg-transparent border-0 p-4 pt-0">
            <a href="#" class="btn btn-link text-primary p-0 text-decoration-none fw-semibold">Baca Selengkapnya <i class="bi bi-arrow-right ms-1"></i></a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<section id="tracking" class="py-5">
  <div class="container py-4">
    <div class="text-center mb-4">
      <span class="text-primary text-uppercase fw-bold tracking-wider">Sistem Integrasi</span>
      <h2 class="fw-bold mt-2">Lacak Status Alat & Order</h2>
      <p class="text-muted">Masukkan nomor order atau nama perusahaan Anda untuk memeriksa progres pengerjaan.</p>
    </div>

    <div class="card shadow border-0 p-4 mx-auto bg-white rounded-4" style="max-width: 650px;">
      <form action="{{ route('cek.alat') }}" method="POST">
        @csrf
        <div class="input-group input-group-lg">
          <input type="text" name="keyword" class="form-control border-end-0" placeholder="Contoh: ORD-123456 atau PT Maju Jaya" required style="font-size: 1rem;">
          <button class="btn btn-primary px-4">
            <i class="bi bi-search me-2"></i> Cari
          </button>
        </div>
      </form>
    </div>
        
    @if(session('order'))
      @php $order = session('order'); @endphp
      <div class="card mt-4 shadow-sm border-0 border-start border-4 border-primary mx-auto" style="max-width: 650px;">
        <div class="card-body p-4">
          <h5 class="fw-bold mb-3 text-dark d-flex align-items-center">
            <i class="bi bi-info-circle-fill text-primary me-2"></i> Hasil Pelacakan Status Order
          </h5>
          <div class="row g-2 small text-muted">
            <div class="col-sm-4 fw-bold">Nomor Order:</div>
            <div class="col-sm-8 text-dark">{{ $order->order_number }}</div>
            
            <div class="col-sm-4 fw-bold">Customer:</div>
            <div class="col-sm-8 text-dark">{{ $order->customer_name }}</div>
            
            <div class="col-sm-4 fw-bold">Alat:</div>
            <div class="col-sm-8 text-dark">{{ $order->instrument }}</div>
            
            <div class="col-sm-4 fw-bold">Status:</div>
            <div class="col-sm-8">
              <span class="badge bg-success px-2 py-1">{{ $order->status }}</span>
            </div>
            
            <div class="col-sm-4 fw-bold">Tanggal Diterima:</div>
            <div class="col-sm-8 text-dark">{{ $order->received_date }}</div>
            
            <div class="col-sm-4 fw-bold">Tanggal Selesai:</div>
            <div class="col-sm-8 text-dark">{{ $order->completed_date ?? '-' }}</div>
            
            <div class="col-sm-4 fw-bold">Teknisi:</div>
            <div class="col-sm-8 text-dark">{{ $order->technician->name ?? 'Belum ditugaskan' }}</div>
          </div>
        </div>
      </div>
    @endif
  </div>
</section>

<section id="clients" class="py-5 bg-light">
  <div class="container">
    <div class="text-center mb-5">
      <span class="text-primary text-uppercase fw-bold tracking-wider">Mitra Strategis</span>
      <h2 class="fw-bold mt-2">Dipercaya oleh Perusahaan Terkemuka</h2>
      <p class="text-muted">Komitmen kami berbuah kepercayaan dari berbagai sektor industri nasional</p>
    </div>
    <div class="row g-4 row-cols-2 row-cols-md-4 justify-content-center align-items-center">
      @foreach (['kalbe-logo.png','totalpack-logo.png','magna-logo.png','marutake-logo.png', 'pt_tsh.png', 'logo-trix.png', 'fasi-logo.png', 'fuji-seat-logo.png' ] as $logo)
      <div class="text-center">
        <div class="client-card p-3 bg-transparent border-0">
          <img src="{{ asset('images/client/' . $logo) }}" alt="Logo Mitra PT Rukun Calibration Laboratory" class="img-fluid client-img">
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
@endsection