@extends('layouts.app')

@section('content')
<section class="py-5">
  <div class="container">
    <h2 class="section-heading text-center mb-4">Berita Terbaru</h2>
    <div class="row g-4">
      <!-- Berita 1 -->
      <div class="col-md-4">
        <div class="card shadow-sm h-100">
          <img src="{{ asset('images/berita/berita1.jpg') }}" class="card-img-top" alt="Berita 1">
          <div class="card-body">
            <h5 class="fw-bold">Pelatihan Kalibrasi</h5>
            <p>Pelatihan kalibrasi peralatan ISO 17025 yang diikuti oleh teknisi dari berbagai daerah.</p>
            <a href="#" class="btn btn-primary btn-sm">Baca Selengkapnya</a>
          </div>
        </div>
      </div>
      <!-- Berita 2 -->
      <div class="col-md-4">
        <div class="card shadow-sm h-100">
          <img src="{{ asset('images/berita/berita2.jpg') }}" class="card-img-top" alt="Berita 2">
          <div class="card-body">
            <h5 class="fw-bold">Workshop Instrumental</h5>
            <p>Workshop pengenalan alat ukur kimia instrumental dengan praktek langsung.</p>
            <a href="#" class="btn btn-primary btn-sm">Baca Selengkapnya</a>
          </div>
        </div>
      </div>
      <!-- Berita 3 -->
      <div class="col-md-4">
        <div class="card shadow-sm h-100">
          <img src="{{ asset('images/berita/berita3.jpg') }}" class="card-img-top" alt="Berita 3">
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
@endsection
