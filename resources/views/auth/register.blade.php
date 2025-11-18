<x-guest-layout>
<h3 class="text-center mb-4">Buat Akun Baru</h3>


<form method="POST" action="{{ route('register') }}">
@csrf


<div class="mb-3">
<label class="form-label">Nama</label>
<input type="text" name="name" class="form-control" required>
</div>


<div class="mb-3">
<label class="form-label">Email</label>
<input type="email" name="email" class="form-control" required>
</div>


<div class="mb-3">
<label class="form-label">Password</label>
<input type="password" name="password" class="form-control" required>
</div>


<div class="mb-3">
<label class="form-label">Konfirmasi Password</label>
<input type="password" name="password_confirmation" class="form-control" required>
</div>


<button type="submit" class="btn btn-primary w-100 py-2">Daftar</button>


<div class="text-center mt-3 small">
Sudah punya akun? <a href="{{ route('login') }}">Login</a>
</div>
</form>
</x-guest-layout>




<!-- resources/views/auth/forgot-password.blade.php -->
<x-guest-layout>
<h3 class="text-center mb-3">Reset Password</h3>


<p class="small text-center mb-4">Masukkan email Anda, link reset password akan dikirimkan.</p>


<form method="POST" action="{{ route('password.email') }}">
@csrf


<div class="mb-3">
<label class="form-label">Email</label>
<input type="email" name="email" class="form-control" required>
</div>


<button type="submit" class="btn btn-primary w-100 py-2">Kirim Link Reset</button>


<div class="text-center mt-3 small">
<a href="{{ route('login') }}">Kembali ke Login</a>
</div>
</form>
</x-guest-layout>