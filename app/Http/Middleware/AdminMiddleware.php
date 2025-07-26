<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.login')->withErrors(['Silakan login sebagai Admin.']);
        }

        // Check if admin is approved
        $admin = Auth::guard('admin')->user();
        if ($admin && $admin->status !== 'approved') {
            Auth::guard('admin')->logout();
            return redirect()->route('admin.login')->withErrors(['Akun Anda belum disetujui oleh Master Admin.']);
        }

        return $next($request);
    }
}
