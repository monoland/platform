<?php

namespace App\Policies\System;

use App\Models\System\Module;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ModulePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the module.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\System\Module  $module
     * @return mixed
     */
    public function show(User $user, Module $module)
    {
        return $user->hasPermission('show-system-module');
    }

    /**
     * Determine whether the user can view the module.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\System\Module  $module
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-system-module');
    }

    /**
     * Determine whether the user can create modules.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-system-module');
    }

    /**
     * Determine whether the user can update the module.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\System\Module  $module
     * @return mixed
     */
    public function update(User $user, Module $module)
    {
        return $user->hasPermission('update-system-module');
    }

    /**
     * Determine whether the user can delete the module.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\System\Module  $module
     * @return mixed
     */
    public function delete(User $user, Module $module)
    {
        return $user->hasPermission('delete-system-module');
    }

    /**
     * Determine whether the user can restore the module.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\System\Module  $module
     * @return mixed
     */
    public function restore(User $user, Module $module)
    {
        return $user->hasPermission('restore-system-module');
    }

    /**
     * Determine whether the user can permanently delete the module.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\System\Module  $module
     * @return mixed
     */
    public function destroy(User $user, Module $module)
    {
        return $user->hasPermission('destroy-system-module');
    }
}
