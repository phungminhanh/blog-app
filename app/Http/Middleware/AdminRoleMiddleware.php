<?php
// App\Http\Middleware\AdminAuthMiddleware.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminRoleMiddleware
{

    public function handle($request, Closure $next)
    {
        if (Auth::check() ) {
            if(Auth::user()->role === 'admin')
           { 
            return $next($request);
        }elseif(Auth::user()->role === 'editor'){

       
        return redirect('/admin');
    }
        }
        return redirect('/login')->with('error', 'Bạn không có quyền truy cập.');
       
        
    }
    
}