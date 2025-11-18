<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        // Jika user bukan admin, redirect ke halaman home
        if (!auth()->check() || auth()->user()->role !== 'admin') {
            return redirect('/home');
        }

        return $next($request);
    }
}
