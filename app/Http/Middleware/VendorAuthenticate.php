<?php

namespace App\Http\Middleware;

use Closure;

class VendorAuthenticate
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
        // return $next($request);

        if (!auth()->guard('vendor')->check()) {
            //MAKA REDIRECT KE HALAMAN LOGIN
            return redirect(route('vendor.login'));
        }
        //JIKA SUDAH MAKA REQUEST YANG DIMINTA AKAN DISEDIAKAN
        return $next($request);

    }
}
