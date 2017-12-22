<?php namespace Informatics\Auth\Middleware;

use Closure;
use Sentinel;
use Redirect;

class SystemAdminMiddleware
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
        if (Sentinel::inRole('system-admin') || Sentinel::inRole('super-admin')) {
            return $next($request);
        } else {
            abort(405);
        }
    }
}
