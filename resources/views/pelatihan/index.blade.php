@extends('layouts.app')

@section('content')
<section id="pelatihan" class="py-5 bg-light">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="section-heading">Program Pelatihan</h2>
      <p class="text-muted">Kami menyediakan berbagai program pelatihan di bidang kalibrasi & metrologi</p>
    </div>

    <div class="row g-4">
      <!-- Pelatihan 1 -->
      <div class="col-md-4 col-sm-6">
        <div class="card shadow-sm h-100">
          <img src="{{ asset('images/pelatihan/pelatihan-timbangan.png') }}" class="card-img-top" alt="Pelatihan 1">
          <div class="card-body">
            <h5 class="fw-bold">Pelatihan Kalibrasi Timbangan</h5>
            <p class="text-muted small">Materi: prosedur kalibrasi timbangan digital & analitik sesuai standar ISO 17025.</p>
            <a href="#" class="btn btn-primary btn-sm">Daftar Sekarang</a>
          </div>
        </div>
      </div>

      <!-- Pelatihan 2 -->
      <div class="col-md-4 col-sm-6">
        <div class="card shadow-sm h-100">
          <img src="{{ asset('images/pelatihan/pelatihan-timbangan.png') }}" class="card-img-top" alt="Pelatihan 2">
          <div class="card-body">
            <h5 class="fw-bold">Pelatihan Kalibrasi Flow Meter</h5>
            <p class="text-muted small">Materi: teknik kalibrasi flow meter untuk industri minyak & gas.</p>
            <a href="#" class="btn btn-primary btn-sm">Daftar Sekarang</a>
          </div>
        </div>
      </div>

      <!-- Pelatihan 3 -->
      <div class="col-md-4 col-sm-6">
        <div class="card shadow-sm h-100">
          <img src="{{ asset('images/pelatihan/pelatihan-timbangan.png') }}" class="card-img-top" alt="Pelatihan 3">
          <div class="card-body">
            <h5 class="fw-bold">Pelatihan Alat Ukur Suhu</h5>
            <p class="text-muted small">Materi: kalibrasi termometer, sensor suhu, dan oven laboratorium.</p>
            <a href="#" class="btn btn-primary btn-sm">Daftar Sekarang</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Tambahan Info -->
    <div class="mt-5 p-4 bg-white shadow-sm rounded">
      <h4 class="fw-bold">Kenapa memilih pelatihan kami?</h4>
      <ul>
        <li>Instruktur berpengalaman di bidang kalibrasi & metrologi</li>
        <li>Materi sesuai standar ISO 17025</li>
        <li>Sertifikat resmi untuk setiap peserta</li>
        <li>Praktik langsung dengan peralatan laboratorium</li>
      </ul>
    </div>
  </div>
</section>
@endsection
