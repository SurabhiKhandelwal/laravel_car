<?php

namespace App\Http\Middleware;

use Closure;

class RegisteredUserMiddleware
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
        if (Sentinel::inRole('registered-user')) {
            return $next($request);
        } else {
            return Redirect::to('/user')
                            ->withErrors('Sorry...! You are not autherised contact to admin');
        }
    }
}
