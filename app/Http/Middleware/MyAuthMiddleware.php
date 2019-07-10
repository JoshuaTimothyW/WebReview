<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;
use Exception;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

class MyAuthMiddleware
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
        try {
            // Cari data user lewat token
            $member = JWTAuth::parseToken()->authenticate();
        } catch (Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
                # Data ada, tapi token salah
                return response()->json(['status' => 'Token is Invalid']);
            }else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
                # Masa Token habis/expired
                $newtoken = auth()->refresh();
                return response()->json(['status' => 'Token is Expired','new_token' => $newtoken]);
            }else{
                # Tidak Ada Token
                return response()->json(['status' => 'Authorization Token not found']);
            }
        }

        // Kalo exist, terusin
        return $next($request);
    }
}
