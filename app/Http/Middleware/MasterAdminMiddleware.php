<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class MasterAdminMiddleware
{
    public function handle($request, Closure $next)
    {
        // if (!Session::has('master_admin')) {
        //     return redirect()->route('admin.login')->withErrors(['Silakan login sebagai Master Admin.']);
        // }

        return $next($request);
    }
}
