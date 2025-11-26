<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Calibration Service' }}</title>

    {{-- Bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Google Font Modern --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        .card {
    border-radius: 16px !important;
}

input.form-control {
    border-radius: 12px 0 0 12px !important;
}

.btn-primary {
    border-radius: 0 12px 12px 0 !important;
}
    </style>

    @stack('styles')
</head>
<body>

    {{-- MAIN CONTENT --}}
    <main>
        @yield('content')
    </main>
    {{-- Script --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')
</body>
</html>
