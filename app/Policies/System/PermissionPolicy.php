<?php

namespace App\Policies\System;

use App\Models\System\Permission;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PermissionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the permission.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\System\Permission  $permission
     * @return mixed
     */
    public function show(User $user, Permission $permission)
    {
        return $user->hasPermission('show-system-permission');
    }

    /**
     * Determine whether the user can view the permission.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\System\Permission  $permission
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-system-permission');
    }

    /**
     * Determine whether the user can create permissions.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-system-permission');
    }

    /**
     * Determine whether the user can update the permission.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\System\Permission  $permission
     * @return mixed
     */
    public function update(User $user, Permission $permission)
    {
        return $user->hasPermission('update-system-permission');
    }

    /**
     * Determine whether the user can delete the permission.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\System\Permission  $permission
     * @return mixed
     */
    public function delete(User $user, Permission $permission)
    {
        return $user->hasPermission('delete-system-permission');
    }

    /**
     * Determine whether the user can restore the permission.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\System\Permission  $permission
     * @return mixed
     */
    public function restore(User $user, Permission $permission)
    {
        return $user->hasPermission('restore-system-permission');
    }

    /**
     * Determine whether the user can permanently delete the permission.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\System\Permission  $permission
     * @return mixed
     */
    public function destroy(User $user, Permission $permission)
    {
        return $user->hasPermission('destroy-system-permission');
    }
}
