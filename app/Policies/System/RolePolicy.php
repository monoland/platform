<?php

namespace App\Policies\System;

use App\Models\System\Role;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the role.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\System\Role  $role
     * @return mixed
     */
    public function show(User $user, Role $role)
    {
        return $user->hasPermission('show-system-role');
    }

    /**
     * Determine whether the user can view the role.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\System\Role  $role
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-system-role');
    }

    /**
     * Determine whether the user can create roles.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-system-role');
    }

    /**
     * Determine whether the user can update the role.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\System\Role  $role
     * @return mixed
     */
    public function update(User $user, Role $role)
    {
        return $user->hasPermission('update-system-role');
    }

    /**
     * Determine whether the user can delete the role.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\System\Role  $role
     * @return mixed
     */
    public function delete(User $user, Role $role)
    {
        return $user->hasPermission('delete-system-role');
    }

    /**
     * Determine whether the user can restore the role.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\System\Role  $role
     * @return mixed
     */
    public function restore(User $user, Role $role)
    {
        return $user->hasPermission('restore-system-role');
    }

    /**
     * Determine whether the user can permanently delete the role.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\System\Role  $role
     * @return mixed
     */
    public function destroy(User $user, Role $role)
    {
        return $user->hasPermission('destroy-system-role');
    }
}
