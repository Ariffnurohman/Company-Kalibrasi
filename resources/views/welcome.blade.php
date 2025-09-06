<div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{ asset('images/hero1.jpg') }}" class="d-block w-100" alt="Hero 1">
    </div>
    <div class="carousel-item">
      <img src="{{ asset('images/hero2.jpg') }}" class="d-block w-100" alt="Hero 2">
    </div>
    <div class="carousel-item">
      <img src="{{ asset('images/hero3.jpg') }}" class="d-block w-100" alt="Hero 3">
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
