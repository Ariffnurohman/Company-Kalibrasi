@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="about-hero text-center text-white d-flex align-items-center">
  <div class="container">
    <h1 class="display-4 fw-bold">Tentang Kami</h1>
    <p class="lead">Mengenal lebih dekat PT Rukun Calibration Laboratory</p>
  </div>
</section>

<!-- Company Profile -->
<section class="py-5">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6 mb-4 mb-md-0">
        <img src="{{ asset('images/berita/berita1.png') }}" alt="Tentang Kami" class="img-fluid rounded shadow">
      </div>
      <div class="col-md-6">
        <h2 class="fw-bold mb-3">Profil Perusahaan</h2>
        <p>
          PT Rukun Calibration Laboratory adalah perusahaan jasa kalibrasi peralatan ukur dan pelatihan yang berfokus pada
          pelayanan pelanggan dengan standar mutu internasional. Kami berkomitmen memberikan layanan terbaik, profesional,
          edukatif, dan informatif untuk membantu industri mencapai akurasi dan kualitas yang lebih baik.
        </p>
        <p>
          Dengan dukungan tenaga ahli berpengalaman dan peralatan kalibrasi terkini, kami siap melayani berbagai kebutuhan
          kalibrasi, pelatihan, serta penyediaan alat ukur yang sesuai dengan standar ISO 17025:2017.
        </p>
      </div>
    </div>
  </div>
</section>

<!-- Visi & Misi -->
<section class="bg-light py-5">
  <div class="container text-center">
    <h2 class="fw-bold mb-4">Visi & Misi</h2>
    <div class="row">
      <div class="col-md-6 mb-4">
        <div class="p-4 border rounded shadow-sm h-100">
          <h4 class="fw-bold">Visi</h4>
          <p>Menjadi laboratorium kalibrasi terpercaya yang diakui secara nasional dan internasional.</p>
        </div>
      </div>
      <div class="col-md-6 mb-4">
        <div class="p-4 border rounded shadow-sm h-100">
          <h4 class="fw-bold">Misi</h4>
          <ul class="list-unstyled text-start">
            <li>✔ Memberikan layanan kalibrasi berkualitas tinggi.</li>
            <li>✔ Mengutamakan kepuasan pelanggan.</li>
            <li>✔ Mengembangkan sumber daya manusia yang kompeten.</li>
            <li>✔ Mendukung kemajuan industri dengan teknologi terkini.</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
