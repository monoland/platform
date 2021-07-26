<?php

namespace App\Policies\MyHistory;

use App\Models\MyHistory\Position;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PositionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the position.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyHistory\Position  $position
     * @return mixed
     */
    public function show(User $user, Position $position)
    {
        return $user->hasPermission('show-myhistory-position');
    }

    /**
     * Determine whether the user can view the position.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyHistory\Position  $position
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-myhistory-position');
    }

    /**
     * Determine whether the user can create positions.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-myhistory-position');
    }

    /**
     * Determine whether the user can update the position.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyHistory\Position  $position
     * @return mixed
     */
    public function update(User $user, Position $position)
    {
        return $user->hasPermission('update-myhistory-position');
    }

    /**
     * Determine whether the user can delete the position.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyHistory\Position  $position
     * @return mixed
     */
    public function delete(User $user, Position $position)
    {
        return $user->hasPermission('delete-myhistory-position');
    }

    /**
     * Determine whether the user can restore the position.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyHistory\Position  $position
     * @return mixed
     */
    public function restore(User $user, Position $position)
    {
        return $user->hasPermission('restore-myhistory-position');
    }

    /**
     * Determine whether the user can permanently delete the position.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyHistory\Position  $position
     * @return mixed
     */
    public function destroy(User $user, Position $position)
    {
        return $user->hasPermission('destroy-myhistory-position');
    }
}
