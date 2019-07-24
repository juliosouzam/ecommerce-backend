<?php

namespace App\Http\Middleware;

use Closure;

class ResquestAuthenticate
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
        if (!$request->expectsJson()) {
            return response()->json(['error' => 'Bad request accept'], 422);
        }

        return $next($request);
    }
}
