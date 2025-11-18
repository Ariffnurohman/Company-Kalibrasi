<x-guest-layout>

@if(session('status'))
<div class="alert alert-success small">{{ session('status') }}</div>
@endif

<form method="POST" action="{{ route('login') }}">
    @csrf

    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" required autofocus>
        @error('email')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control" required>
        @error('password')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="d-flex justify-content-between mb-3">
        <div>
            <input type="checkbox" name="remember"> <small>Ingat saya</small>
        </div>

        @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}" class="small">Lupa password?</a>
        @endif
    </div>

    <button type="submit" class="btn btn-primary w-100 py-2">Login</button>

    @if (Route::has('register'))
        <div class="text-center mt-3 small">
            Belum punya akun? <a href="{{ route('register') }}">Register</a>
        </div>
    @endif
</form>

</x-guest-layout>
