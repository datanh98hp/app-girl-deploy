<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Tymon\JWTAuth\Exceptions\TokenBlacklistedException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Illuminate\Foundation\Http\Middleware\TrimStrings as Middleware;
class JwtAuthVery extends Middleware
{
    public function handle($request, Closure $next)
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (JWTException $e) {
            if ($e instanceof TokenInvalidException) {
                return response()->json([
                    'status'=>false,
                    'msg'=>'Token không hợp lệ'
                ]);
            } else if ($e instanceof TokenBlacklistedException) {
                return response()->json([
                    'status'=>false,
                    'msg'=>'Token hết hạn'
                ]);
            } else {
                return response()->json([
                    'status'=>false,
                    'msg'=>'Xin vui lòng truyền vào token'
                ]);
            }
        }
        return $next($request);
    }
}
