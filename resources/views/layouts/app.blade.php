<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RST CALIBRATION</title>
    <link rel="icon" type="image/png" href="{{ asset('images/rukun-logo_5.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/layanan.css') }}">
    <link rel="stylesheet" href="{{ asset('css/theme.css') }}">
    <link rel="stylesheet" href="{{ asset('css/clients.css') }}">
    <link rel="stylesheet" href="{{ asset('css/gallery.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">



    
    <!-- AOS CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">




</head>

<body>

    {{-- Navbar --}}
    @include('layouts.navbar')

    {{-- Konten --}}
    <div class="container my-4">
        @yield('content')
    </div>
    
    @include('layouts.footer') {{-- <== panggil footer disini --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/theme.js') }}"></script>
    <!-- AOS JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000, // lama animasi (ms)
            once: true // hanya sekali animasi (tidak ulang saat scroll naik)
        });
    </script>

</body>

</html>