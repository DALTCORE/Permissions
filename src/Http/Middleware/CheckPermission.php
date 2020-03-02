<?php

namespace DALTCORE\Permissions\Http\Middleware;

use Closure;

class CheckPermission
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

        if(!$request->user()->hasPermission($permission))
        {
            return redirect()->back()->withError('You do not have the permission '. $permission);
        }

        return $next($request);
    }
}
