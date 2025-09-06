@extends('layouts.app')



<!-- Hero / Header -->
<section class="service-hero text-white d-flex align-items-center justify-content-center">
  <div class="text-center">
    <h1 class="fw-bold">Layanan Kami</h1>
    <p>Kami menyediakan jasa kalibrasi, pelatihan, dan perawatan alat ukur dengan standar internasional</p>
  </div>
</section>

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
            <a href="#" class="btn btn-primary">Selengkapnya</a>
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
            <a href="#" class="btn btn-primary">Selengkapnya</a>
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



