@extends('layouts.app')

@section('content')
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
@endsection
