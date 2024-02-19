<?php

namespace App\Http\Middleware;

use Closure;

class CheckUrlParameters
{
    public function handle($request, Closure $next)
    {
        // Kiểm tra các tham số truyền qua URL
        if ($request->filled('id') || $request->filled('other_parameter')) {
            // Nếu có, chặn và trả về lỗi 403 (Forbidden)
            abort(403, 'Không được phép thay đổi thông tin qua URL.');
        }

        // Nếu không có sự thay đổi, tiếp tục xử lý request
        return $next($request);
    }
}
