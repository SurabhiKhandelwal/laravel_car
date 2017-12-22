<?php namespace Pool\Auth\Middleware;

use Closure;
use Illuminate\Support\Facades\Redirect;
use Sentinel;
use Illuminate\Support\Facades\Route;

/**
 * AuthMiddleware 
 */
class AuthMiddleware
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
        if (Sentinel::check()) {
            return $next($request);
        } else {
            return Redirect::to('admin-login')
                ->withErrors('Please login first');
        }
    }
}
