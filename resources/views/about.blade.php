@extends('layouts.app')

@section('content')

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

<!-- Company Profile -->
<section class="py-5">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6 mb-4 mb-md-0">
        <img src="{{ asset('images/rst-krw.jpeg') }}" alt="Tentang Kami" class="img-fluid rounded shadow">
      </div>
      <div class="col-md-6">
        <h2 class="fw-bold mb-3">About Us</h2>
        <p>
          PT. Rukun Sejahtera Teknik achieved a rapid growth over the years and becomes the market leader in the field on industrial supplies.
          Our extensive and comprehensive products range are specialized in supplying and servicing the aerospace, construction, fabrication, maintenance, automotive, machine shop, mining, shipyard, oil & gas, mold & dies, chemical and tire manufacturing industries, etc.
          We are dedicated to providing our costumers with commited and well-trained team members with outstanding products, timely delivery, and cotumer service that is second to none.
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
          <h4 class="fw-bold"> Our Vision</h4>
          <p>Menjadi laboratorium kalibrasi terpercaya yang diakui secara nasional dan internasional.</p>
        </div>
      </div>
      <div class="col-md-6 mb-4">
        <div class="p-4 border rounded shadow-sm h-100">
          <h4 class="fw-bold">Our Misi</h4>
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
