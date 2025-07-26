<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        // if (!Session::has('admin')) {
        //     return redirect()->route('admin.login')->withErrors(['Silakan login sebagai Admin.']);
        // }

        // // Validasi status harus 'approved'
        // if (Session::get('admin')->status !== 'approved') {
        //     return redirect()->route('admin.login')->withErrors(['Akun Anda belum disetujui oleh Master Admin.']);
        // }

        return $next($request);
    }
}
