<?php

namespace App\Policies\System;

use App\Models\System\Ability;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AbilityPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the ability.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\System\Ability  $ability
     * @return mixed
     */
    public function show(User $user, Ability $ability)
    {
        return $user->hasPermission('show-system-ability');
    }

    /**
     * Determine whether the user can view the ability.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\System\Ability  $ability
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-system-ability');
    }

    /**
     * Determine whether the user can create abilities.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-system-ability');
    }

    /**
     * Determine whether the user can update the ability.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\System\Ability  $ability
     * @return mixed
     */
    public function update(User $user, Ability $ability)
    {
        return $user->hasPermission('update-system-ability');
    }

    /**
     * Determine whether the user can delete the ability.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\System\Ability  $ability
     * @return mixed
     */
    public function delete(User $user, Ability $ability)
    {
        return $user->hasPermission('delete-system-ability');
    }

    /**
     * Determine whether the user can restore the ability.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\System\Ability  $ability
     * @return mixed
     */
    public function restore(User $user, Ability $ability)
    {
        return $user->hasPermission('restore-system-ability');
    }

    /**
     * Determine whether the user can permanently delete the ability.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\System\Ability  $ability
     * @return mixed
     */
    public function destroy(User $user, Ability $ability)
    {
        return $user->hasPermission('destroy-system-ability');
    }
}
