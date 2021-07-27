<?php

namespace App\Policies\Reference;

use App\Models\Reference\Positionkind;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PositionkindPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the positionkind.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Positionkind  $positionkind
     * @return mixed
     */
    public function show(User $user, Positionkind $positionkind)
    {
        return $user->hasPermission('show-reference-positionkind');
    }

    /**
     * Determine whether the user can view the positionkind.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Positionkind  $positionkind
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-reference-positionkind');
    }

    /**
     * Determine whether the user can create positionkinds.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-reference-positionkind');
    }

    /**
     * Determine whether the user can update the positionkind.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Positionkind  $positionkind
     * @return mixed
     */
    public function update(User $user, Positionkind $positionkind)
    {
        return $user->hasPermission('update-reference-positionkind');
    }

    /**
     * Determine whether the user can delete the positionkind.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Positionkind  $positionkind
     * @return mixed
     */
    public function delete(User $user, Positionkind $positionkind)
    {
        return $user->hasPermission('delete-reference-positionkind');
    }

    /**
     * Determine whether the user can restore the positionkind.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Positionkind  $positionkind
     * @return mixed
     */
    public function restore(User $user, Positionkind $positionkind)
    {
        return $user->hasPermission('restore-reference-positionkind');
    }

    /**
     * Determine whether the user can permanently delete the positionkind.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Positionkind  $positionkind
     * @return mixed
     */
    public function destroy(User $user, Positionkind $positionkind)
    {
        return $user->hasPermission('destroy-reference-positionkind');
    }
}
