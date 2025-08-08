<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class RateLimitSearch
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $key = 'search:' . $request->ip();
        
        // Allow 10 searches per minute per IP
        if (RateLimiter::tooManyAttempts($key, 10)) {
            Log::warning('Search rate limit exceeded for IP: ' . $request->ip());
            
            return response()->json([
                'error' => 'Muitas tentativas de busca. Tente novamente em 1 minuto.',
                'retry_after' => RateLimiter::availableIn($key)
            ], 429);
        }
        
        RateLimiter::hit($key, 60); // 1 minute decay
        
        return $next($request);
    }
}
