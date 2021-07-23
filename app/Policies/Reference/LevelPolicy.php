<?php

namespace App\Policies\Reference;

use App\Models\Reference\Level;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class LevelPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the level.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Level  $level
     * @return mixed
     */
    public function show(User $user, Level $level)
    {
        return $user->hasPermission('show-reference-level');
    }

    /**
     * Determine whether the user can view the level.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Level  $level
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-reference-level');
    }

    /**
     * Determine whether the user can create levels.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-reference-level');
    }

    /**
     * Determine whether the user can update the level.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Level  $level
     * @return mixed
     */
    public function update(User $user, Level $level)
    {
        return $user->hasPermission('update-reference-level');
    }

    /**
     * Determine whether the user can delete the level.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Level  $level
     * @return mixed
     */
    public function delete(User $user, Level $level)
    {
        return $user->hasPermission('delete-reference-level');
    }

    /**
     * Determine whether the user can restore the level.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Level  $level
     * @return mixed
     */
    public function restore(User $user, Level $level)
    {
        return $user->hasPermission('restore-reference-level');
    }

    /**
     * Determine whether the user can permanently delete the level.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Level  $level
     * @return mixed
     */
    public function destroy(User $user, Level $level)
    {
        return $user->hasPermission('destroy-reference-level');
    }
}
