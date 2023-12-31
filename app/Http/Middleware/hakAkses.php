<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class hakAkses
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            // Periksa apakah pengguna memiliki peran (role) sebagai admin
            if (Auth::user()->role === 'admin') {
                // Jika pengguna adalah admin, arahkan mereka ke halaman sebelumnya
                return redirect()->back();
            }

            // Jika bukan admin, izinkan akses ke halaman
            return $next($request);
        }

        return redirect('log');
    }
}
