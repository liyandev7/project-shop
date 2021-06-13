<?php

namespace App\Http\Middleware;

use Closure;

class CheckBlockUser
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
        if ($request->user()->sttaf === 0) {
            return abort(403);
        }
        return $next($request);
    }
}