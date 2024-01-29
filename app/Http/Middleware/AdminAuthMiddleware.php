<?php
// App\Http\Middleware\AdminAuthMiddleware.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminAuthMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request);
        }
        return redirect('/login')->with('error', 'Bạn không có quyền truy cập.');
       
        
    }
    
}
