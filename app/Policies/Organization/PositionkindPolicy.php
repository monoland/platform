<?php

namespace App\Policies\Organization;

use App\Models\Organization\Positionkind;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PositionkindPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the positionkind.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Organization\Positionkind  $positionkind
     * @return mixed
     */
    public function show(User $user, Positionkind $positionkind)
    {
        return $user->hasPermission('show-organization-positionkind');
    }

    /**
     * Determine whether the user can view the positionkind.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Organization\Positionkind  $positionkind
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-organization-positionkind');
    }

    /**
     * Determine whether the user can create positionkinds.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-organization-positionkind');
    }

    /**
     * Determine whether the user can update the positionkind.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Organization\Positionkind  $positionkind
     * @return mixed
     */
    public function update(User $user, Positionkind $positionkind)
    {
        return $user->hasPermission('update-organization-positionkind');
    }

    /**
     * Determine whether the user can delete the positionkind.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Organization\Positionkind  $positionkind
     * @return mixed
     */
    public function delete(User $user, Positionkind $positionkind)
    {
        return $user->hasPermission('delete-organization-positionkind');
    }

    /**
     * Determine whether the user can restore the positionkind.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Organization\Positionkind  $positionkind
     * @return mixed
     */
    public function restore(User $user, Positionkind $positionkind)
    {
        return $user->hasPermission('restore-organization-positionkind');
    }

    /**
     * Determine whether the user can permanently delete the positionkind.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Organization\Positionkind  $positionkind
     * @return mixed
     */
    public function destroy(User $user, Positionkind $positionkind)
    {
        return $user->hasPermission('destroy-organization-positionkind');
    }
}
