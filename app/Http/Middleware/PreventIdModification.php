<?php

namespace App\Http\Middleware;

use Closure;

class PreventIdModification
{
    public function handle($request, Closure $next)
    {
        // Kiểm tra nếu request có chứa tham số id
        if ($request->has('id')) {
            // Nếu có, chặn và trả về lỗi 403 (Forbidden)
            abort(403, 'Không được phép sửa đổi ID trực tiếp.');
        }

        // Nếu không có tham số id, tiếp tục xử lý request
        return $next($request);
    }
}
