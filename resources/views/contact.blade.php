@extends('layouts.app')

@section('content')
<section class="py-5">
  <div class="container">
    <h2 class="text-center mb-4">Kontak & Penawaran</h2>
    <p class="text-center text-muted">Hubungi kami untuk penawaran jasa kalibrasi & pelatihan sesuai kebutuhan Anda.</p>

    @if(session('success'))
      <div class="alert alert-success text-center">
        {{ session('success') }}
      </div>
    @endif

    <div class="row g-4">
      <!-- Maps -->
      <div class="col-md-6">
        <h5 class="mb-3">Lokasi Kami</h5>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.485168493731!2d107.31211890869777!3d-6.331129893632!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6977c204e86b73%3A0x2aec1338aee4f290!2sPT.Rukun%20Sejahtera%20Teknik!5e0!3m2!1sid!2sid!4v1757320125682!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></iframe>
      </div>

      <!-- Form Penawaran -->
      <div class="col-md-6">
        <div class="card shadow-sm">
          <div class="card-body">
            <h5 class="mb-3">Form Penawaran</h5>
            <form action="{{ route('contact.offer') }}" method="POST">
              @csrf

              <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control" required>
              </div>

              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
              </div>

              <div class="mb-3">
                <label for="telepon" class="form-label">No. Telepon</label>
                <input type="text" name="telepon" id="telepon" class="form-control" required>
              </div>

              <div class="mb-3">
                <label for="layanan" class="form-label">Layanan</label>
                <select name="layanan" id="layanan" class="form-select" required>
                  <option value="">-- Pilih Layanan --</option>
                  <option value="kalibrasi">Kalibrasi Alat</option>
                  <option value="pelatihan">Pelatihan</option>
                  <option value="lainnya">Lainnya</option>
                </select>
              </div>

              <div class="mb-3">
                <label for="pesan" class="form-label">Pesan Tambahan</label>
                <textarea name="pesan" id="pesan" rows="4" class="form-control"></textarea>
              </div>

              <div class="text-end">
                <button type="submit" class="btn btn-primary">Kirim Penawaran</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
