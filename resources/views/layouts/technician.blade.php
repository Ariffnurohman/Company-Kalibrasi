<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Technician Panel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/technician.css') }}">
</head>

<body class="bg-light">

<div class="d-flex">
    @include('technician.partials.sidebar')

    <div class="content-wrapper flex-grow-1">
        <nav class="navbar bg-white shadow-sm px-4">
            <h5 class="mb-0 fw-semibold">Technician Panel</h5>
        </nav>

        <div class="p-4">
            @yield('content')
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
