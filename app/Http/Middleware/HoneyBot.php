<?php

namespace App\Http\Middleware;

// use \App\Http\Middleware\HoneyBot::class
use Closure;

class HoneyBot
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
        if($request->isMethod('POST') && count($request->honey_pot) != 0 ){
            return redirect('register');
        }
        return $next($request);
    }
}
