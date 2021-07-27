<?php

namespace App\Policies\Reference;

use App\Models\Reference\Positiontype;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PositiontypePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the positiontype.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Positiontype  $positiontype
     * @return mixed
     */
    public function show(User $user, Positiontype $positiontype)
    {
        return $user->hasPermission('show-reference-positiontype');
    }

    /**
     * Determine whether the user can view the positiontype.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Positiontype  $positiontype
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-reference-positiontype');
    }

    /**
     * Determine whether the user can create positiontypes.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-reference-positiontype');
    }

    /**
     * Determine whether the user can update the positiontype.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Positiontype  $positiontype
     * @return mixed
     */
    public function update(User $user, Positiontype $positiontype)
    {
        return $user->hasPermission('update-reference-positiontype');
    }

    /**
     * Determine whether the user can delete the positiontype.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Positiontype  $positiontype
     * @return mixed
     */
    public function delete(User $user, Positiontype $positiontype)
    {
        return $user->hasPermission('delete-reference-positiontype');
    }

    /**
     * Determine whether the user can restore the positiontype.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Positiontype  $positiontype
     * @return mixed
     */
    public function restore(User $user, Positiontype $positiontype)
    {
        return $user->hasPermission('restore-reference-positiontype');
    }

    /**
     * Determine whether the user can permanently delete the positiontype.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Positiontype  $positiontype
     * @return mixed
     */
    public function destroy(User $user, Positiontype $positiontype)
    {
        return $user->hasPermission('destroy-reference-positiontype');
    }
}
