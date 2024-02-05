<?php
// App\Http\Middleware\AdminAuthMiddleware.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminAuthMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() ) {
            if(Auth::user()->role === 'admin'||Auth::user()->role === 'editor')
           { 
            return $next($request);
        }
        return redirect('/login')->with('error', 'Bạn không có quyền truy cập.');
        }
        return redirect('/login')->with('error', 'Bạn không có quyền truy cập.');
       
        
    }
    
}
