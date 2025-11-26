<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tracking Order</title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100 min-h-screen">

    <!-- HEADER -->
    <header class="bg-white shadow-sm py-4">
        <div class="max-w-6xl mx-auto px-6 flex justify-between items-center">
            <h1 class="text-2xl font-extrabold text-gray-800 flex items-center gap-2">
                📦 Tracking System
            </h1>

        </div>
    </header>

    <!-- CONTENT WRAPPER -->
    <main class="max-w-5xl mx-auto px-6 py-10">
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="text-center text-gray-500 text-sm py-6 mt-10">
        © {{ date('Y') }} Calibration System — All Rights Reserved
    </footer>

</body>
</html>
