@extends('layouts.app')


<section id="clients" class="py-5 bg-light">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="section-heading">Client Kami</h2>
      <p class="text-muted">Perusahaan & organisasi yang telah mempercayakan layanan kami</p>
    </div>

    <div class="row g-4">
      <!-- Client 1 -->
      <div class="col-6 col-md-3 text-center">
        <div class="client-card shadow-sm p-3 bg-white rounded">
          <img src="{{ asset('images/client/kalbe-logo.png') }}" alt="Client 1" class="img-fluid client-img">
        </div>
      </div>

      <!-- Client 2 -->
      <div class="col-6 col-md-3 text-center">
        <div class="client-card shadow-sm p-3 bg-white rounded">
          <img src="{{ asset('images/client/totalpack-logo.png') }}" alt="Client 2" class="img-fluid client-img">
        </div>
      </div>

      <!-- Client 3 -->
      <div class="col-6 col-md-3 text-center">
        <div class="client-card shadow-sm p-3 bg-white rounded">
          <img src="{{ asset('images/client/magna-logo.png') }}" alt="Client 3" class="img-fluid client-img">
        </div>
      </div>

      <!-- Client 4 -->
      <div class="col-6 col-md-3 text-center">
        <div class="client-card shadow-sm p-3 bg-white rounded">
          <img src="{{ asset('images/client/marutake-logo.png') }}" alt="Client 4" class="img-fluid client-img">
        </div>
      </div>

      <!-- Tambah client lain -->
      <div class="col-6 col-md-3 text-center">
        <div class="client-card shadow-sm p-3 bg-white rounded">
          <img src="{{ asset('images/client/indofood-logo.png') }}" alt="Client 5" class="img-fluid client-img">
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

