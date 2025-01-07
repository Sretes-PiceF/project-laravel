<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SiswaMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::check();

        if (!$user) {
            return redirect()->route('public.login')->with('error', 'Anda Harus Menjadi Staff Admin atau Siswa aktif untuk akses halaman ini!!!');
        }

        return $next($request);
    }
}
