<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
            $user = auth('sanctum')->user();
        
            if ($user && $user->role === 'admin') {
                return $next($request);
            }
        
            return response()->json([
                'message' => 'Bạn không có quyền truy cập tài nguyên này.'
            ], 403);
        
    }
}