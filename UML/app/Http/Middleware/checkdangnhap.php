<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class checkdangnhap
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check())
            return redirect('admin/trang-chu');
        // if(Auth::user()->quyen == "admin")
        //     return redirect('admin/trang-chu');
        // else if(Auth::user()->quyen == 'Nhân viên pha chế')
        //     return redirect('admin/pha-che');
        // else if(Auth::user()->quyen == 'Nhân viên tiếp tân')
        //     return redirect('admin/tiep-tan');
        return $next($request);

    }
}
