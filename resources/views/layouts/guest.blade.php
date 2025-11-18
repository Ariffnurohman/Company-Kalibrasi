<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ config('app.name', 'Laravel') }}</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body {
background: #f5f7fa;
font-family: Arial, Helvetica, sans-serif;
}


.auth-container {
min-height: 100vh;
display: flex;
align-items: center;
justify-content: center;
padding: 30px;
}


.auth-card {
background: white;
border-radius: 18px;
box-shadow: 0 8px 25px rgba(0,0,0,0.08);
padding: 40px;
width: 100%;
max-width: 420px;
}


.brand-logo img {
width: 150px;
display: block;
margin: 0 auto 20px auto;
}
</style>
</head>
<body>
<div class="auth-container">
<div class="auth-card">
<div class="brand-logo">
<img src="{{ asset('images/rukun-logo_5.png') }}" alt="RUKUN" height="50">
</div>


{{ $slot }}
</div>
</div>
</body>
</html>