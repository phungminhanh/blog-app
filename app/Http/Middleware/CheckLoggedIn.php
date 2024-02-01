<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckLoggedIn
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            // Người dùng đã đăng nhập, đặt userId vào session
            session(['userId' => Auth::user()->id]);
        }

        return $next($request);
    }
}
