<?php

namespace App\Http\Middleware;


use App\User;
use Closure;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Tymon\JWTAuth\Exceptions\TokenBlacklistedException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Illuminate\Foundation\Http\Middleware\TrimStrings as Middleware;

class ApiAdminAuthenticate extends Middleware
{
    public function handle($request, Closure $next)
    {
        try {
            $user = User::where('api_token', $request->get('api_token'))->first();
            if (is_object($user) ) {
                return $next($request);
            } else {
                return response()->json([
                    'status' => false,
                    'msg' => 'Token không hợp lệ'
                ]);
            }
        } catch (JWTException $e) {
            return response()->json([
                'status' => false,
                'msg' => 'Token không hợp lệ'
            ]);
        }
    }
}
