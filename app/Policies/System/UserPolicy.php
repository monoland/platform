<?php

namespace App\Policies\System;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\System\User  $model
     * @return mixed
     */
    public function show(User $user, User $model)
    {
        return $user->hasPermission('show-system-user');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\System\User  $model
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-system-user');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-system-user');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\System\User  $model
     * @return mixed
     */
    public function update(User $user, User $model)
    {
        return $user->hasPermission('update-system-user');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\System\User  $model
     * @return mixed
     */
    public function delete(User $user, User $model)
    {
        return $user->hasPermission('delete-system-user');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\System\User  $model
     * @return mixed
     */
    public function restore(User $user, User $model)
    {
        return $user->hasPermission('restore-system-user');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\System\User  $model
     * @return mixed
     */
    public function destroy(User $user, User $model)
    {
        return $user->hasPermission('destroy-system-user');
    }
}
