<?php

namespace App\Policies\Organization;

use App\Models\Organization\Positiontype;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PositiontypePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the positiontype.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Organization\Positiontype  $positiontype
     * @return mixed
     */
    public function show(User $user, Positiontype $positiontype)
    {
        return $user->hasPermission('show-organization-positiontype');
    }

    /**
     * Determine whether the user can view the positiontype.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Organization\Positiontype  $positiontype
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-organization-positiontype');
    }

    /**
     * Determine whether the user can create positiontypes.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-organization-positiontype');
    }

    /**
     * Determine whether the user can update the positiontype.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Organization\Positiontype  $positiontype
     * @return mixed
     */
    public function update(User $user, Positiontype $positiontype)
    {
        return $user->hasPermission('update-organization-positiontype');
    }

    /**
     * Determine whether the user can delete the positiontype.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Organization\Positiontype  $positiontype
     * @return mixed
     */
    public function delete(User $user, Positiontype $positiontype)
    {
        return $user->hasPermission('delete-organization-positiontype');
    }

    /**
     * Determine whether the user can restore the positiontype.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Organization\Positiontype  $positiontype
     * @return mixed
     */
    public function restore(User $user, Positiontype $positiontype)
    {
        return $user->hasPermission('restore-organization-positiontype');
    }

    /**
     * Determine whether the user can permanently delete the positiontype.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Organization\Positiontype  $positiontype
     * @return mixed
     */
    public function destroy(User $user, Positiontype $positiontype)
    {
        return $user->hasPermission('destroy-organization-positiontype');
    }
}
