<?php

namespace DALTCORE\Permissions\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $permission)
    {

        if(!$request->user()->hasRole($permission))
        {
            return redirect()->back()->withError('You do not have the role '. $permission);
        }

        return $next($request);
    }
}
