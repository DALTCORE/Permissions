<?php

namespace DALTCORE\Permissions;

use DALTCORE\Permissions\Facades\Permission;

class Facade extends \Illuminate\Support\Facades\Facade
{
    /**
     * {@inheritDoc}
     */
    protected static function getFacadeAccessor()
    {
        return new Permission();
    }
}
