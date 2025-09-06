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

<!-- Tim Kami -->
<section class="py-5">
  <div class="container text-center">
    <h2 class="fw-bold mb-4">Tim Kami</h2>
    <p class="mb-5">Kami terdiri dari tenaga ahli profesional yang berdedikasi dalam memberikan layanan terbaik.</p>
    <div class="row">
      <div class="col-md-4 mb-4">
        <div class="card shadow border-0">
          <img src="{{ asset('images/team1.jpg') }}" class="card-img-top" alt="Tim 1">
          <div class="card-body">
            <h5 class="card-title">Ir. Budi Santoso</h5>
            <p class="card-text">Direktur Utama</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card shadow border-0">
          <img src="{{ asset('images/team2.jpg') }}" class="card-img-top" alt="Tim 2">
          <div class="card-body">
            <h5 class="card-title">Dr. Andi Wijaya</h5>
            <p class="card-text">Kepala Laboratorium</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card shadow border-0">
          <img src="{{ asset('images/team3.jpg') }}" class="card-img-top" alt="Tim 3">
          <div class="card-body">
            <h5 class="card-title">Siti Nurhaliza, M.Si</h5>
            <p class="card-text">Manager Pelatihan</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Footer Section -->
<footer class="bg-dark text-light pt-5 pb-4">
  <div class="container">
    <div class="row">

      <!-- Recent Post -->
      <div class="col-md-4 mb-4">
        <h5 class="footer-heading">Recent Post</h5>
        <ul class="list-unstyled">
          <li><a href="#" class="text-light text-decoration-none">Pelatihan Kalibrasi Alat Ukur</a></li>
          <li><a href="#" class="text-light text-decoration-none">Workshop Instrumental Kimia</a></li>
          <li><a href="#" class="text-light text-decoration-none">Sertifikasi Peserta</a></li>
        </ul>
        <img src="{{ asset('images/kan logo.png') }}" class="img-fluid rounded shadow mt-1" alt="sertifikasi kan">

      </div>

      <!-- Kontak Kami -->
      <div class="col-md-4 mb-4">
        <h5 class="footer-heading">Kontak Kami</h5>
        <p>Email: info@perusahaan.com</p>
        <p>Telepon: +62 812-3456-7890</p>
        <p>Website: www.perusahaan.com</p>
      </div>

      <!-- Alamat & Lokasi -->
      <div class="col-md-4 mb-4">
        <h5 class="footer-heading">Alamat & Lokasi</h5>
        <p>JL. RAYA TELUKJAMBE N0.8 KSB RAYA 8</p>
        <p>KARAWANG SENTRA BIZHUB, KARAWANG</p>
        <div class="map-container mt-2">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18..."
            width="100%" height="200" style="border:0;" allowfullscreen loading="lazy">
          </iframe>
        </div>
      </div>
    </div>
    
    <div class="text-center mt-4">
      <p class="mb-0">&copy; {{ date('Y') }} PT Rukun Sejahtera Teknik. All rights reserved.</p>
    </div>
  </div>
</footer>



