@extends('layouts.app')

@section('content')
<section id="clients" class="py-5 bg-light">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="section-heading">Client Kami</h2>
      <p class="text-muted">Perusahaan & organisasi yang telah mempercayakan layanan kami</p>
    </div>

    <div class="row g-4">
    <div class="row g-4">
      @foreach (['kalbe-logo.png','totalpack-logo.png','magna-logo.png','marutake-logo.png', 'pt_tsh.png', 'logo-trix.png', 'fasi-logo.png'] as $logo)
      <div class="col-6 col-md-3 text-center">
        <div class="client-card p-3 shadow-sm bg-white rounded">
          <img src="{{ asset('images/client/' . $logo) }}" alt="Client" class="img-fluid client-img">
        </div>
      </div>
      @endforeach
</section>

@endsection

