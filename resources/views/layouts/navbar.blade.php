<nav class="navbar navbar-expand-lg navbar-light shadow-sm fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('images/rukun-logo_5.png') }}" alt="RUKUN" height="50">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="home">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="about">Tentang Kami</a></li>
                <li class="nav-item"><a class="nav-link" href="layanan">Layanan</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Klien Kami</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Berita</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Gallery</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Kontak Kami</a></li>
                <li class="nav-item">
                    <button id="theme-toggle" class="btn btn-sm btn-outline-light ms-3">
                        🌙
                    </button>
                </li>   
            </ul>
        </div>
    </div>
</nav>