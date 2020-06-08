<?php

namespace DALTCORE\Permissions\Traits;

use Auth;

trait Roles
{
    /**
     * Roles constructor.
     */
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();

            if ($this->user->hasRoles($this->hasRolesRol) === false) {
                return redirect()->to('/admin')->withError('Je hebt geen toegang tot dit gedeelte van het systeem');
            }

            return $next($request);
        });
    }
}
