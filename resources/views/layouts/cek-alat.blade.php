<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cek Status Kalibrasi</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Custom -->
    <style>
        body {
            background: #f8f9fc;
        }
        .navbar {
            background: white !important;
            border-bottom: 1px solid #e9ecef;
        }
        .footer {
            background: #fff;
            border-top: 1px solid #e9ecef;
        }
        .card {
            border-radius: 14px;
        }
    </style>

</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-light py-3">
        <div class="container d-flex justify-content-between">
            <a class="navbar-brand fw-bold" href="/">
                <i class="bi bi-search"></i> Tracking Kalibrasi
            </a>

            <div>
                <a href="/" class="btn btn-sm btn-outline-primary">
                    <i class="bi bi-house"></i> Home
                </a>
            </div>
        </div>
    </nav>

    <!-- CONTENT -->
    <main class="py-4">
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="footer py-3 mt-4">
        <div class="container text-center text-muted small">
            © {{ date('Y') }} - Sistem Tracking Kalibrasi  
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
