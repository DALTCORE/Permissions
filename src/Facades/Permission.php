<?php

namespace DALTCORE\Permissions\Facades;

use DALTCORE\Permissions\Models\Role;
use DALTCORE\Permissions\Models\Permission as Permissions;

class Permission {

    /**
     * Add new role to the system
     *
     * @param string $name Name of new role
     *
     * @return object Role Instance of Role
     */
    public static function addRole($name)
    {
        return Role::create([
            'name' => $name
        ]);
    }

    /**
     * Remove role from system
     *
     * @param string $name Name of the role to delete
     *
     * @return bool
     */
    public static function removeRole($name)
    {
        $role = Role::where('name', $name)->first();
        $role->permissions()->detach();
        $role->delete();

        return true;
    }

    /**
     * Add new permission to the system
     *
     * @param string $name Name of the new permission
     * @param string $description Description of the new permission
     *
     * @return object Permission Instance of Permission
     */
    public static function addPermission($name, $description)
    {
        return Permissions::create([
            'name' => $name,
            'description' => $description
        ]);
    }

    /**
     * Remove permission from system
     *
     * @param string $name Name of the permission to remove
     *
     * @return bool
     */
    public static function removePermission($name)
    {
        Permissions::where('name', $name)->first()->delete();

        return true;
    }

    /**
     * Give user a specific role
     *
     * @param object $user Instance of user model
     * @param string $roleName name of the role
     *
     * @return object $user
     */
    public static function linkUserToRole($user, $roleName)
    {
        $role = Role::where('name', $roleName)->first();
        $user->roles()->attach($role);

        return $user;
    }

    /**
     * Remove a specific role from user
     *
     * @param object $user Instance of user model
     * @param string $roleName name of the role
     *
     * @return object $user
     */
    public static function takeRoleFromUser($user, $roleName)
    {
        $role = Role::where('name', $roleName)->first();
        $user->roles()->detach($role);

        return $user;
    }
}