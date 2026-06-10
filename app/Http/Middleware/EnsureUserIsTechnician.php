<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsTechnician
{
    public function handle(Request $request, Closure $next): Response
    {
        // Sesuaikan dengan struktur kolom role di database Anda (misal: role == 'technician')
        if (auth()->check() && auth()->user()->role === 'technician') {
            return $next($request);
        }

        // Jika bukan teknisi, tendang ke halaman home atau dashboard masing-masing
        return redirect('/home')->with('error', 'Anda tidak memiliki akses ke halaman teknisi.');
    }
}