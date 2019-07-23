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

                // # Refresh Token dan tampung token baru
                $newtoken = JWTAuth::refresh();

                // # Pakai token baru dengan Authorization
                // $response->header('Authorization','Bearer'.$newtoken);

                // # Set token dengan token yang baru
                // $member = JWTAuth::setToken($newtoken)->toUser();

                // # Auto login dengan token baru
                // Auth::login($user,false);

                return response()->json(['status'=>"Token Expired",'new_token'=>$newtoken]);
            }else{
                
                # Tidak Ada Token
                return response()->json(['status' => 'Authorization Token not found']);
            }
        }

        // Kalo exist, terusin
        return $next($request);
    }
}
