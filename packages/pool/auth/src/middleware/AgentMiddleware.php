<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Redirect;
use Sentinel;

class AgentMiddleware
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
        if (Sentinel::inRole('agent')) {
            return $next($request);
        } else {
            return Redirect::to('/admin')
                            ->withErrors('Sorry...! You are not autherised contact to admin');
        }
    }
}
