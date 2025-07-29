<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class VerifyEmail
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
        if (Auth::user('vendor')->email_verified_at === null) {
            return new JsonResponse(
                [
                    'success' => false,
                    'message' => 'Please verify your email before you can continue'
                ],
                401
            );
        } else if (Auth::user('client')->email_verified_at === null) {
            return new JsonResponse(
                [
                    'success' => false,
                    'message' => 'Please verify your email before you can continue'
                ],
                401
            );
        }
        return $next($request);
    }
}
