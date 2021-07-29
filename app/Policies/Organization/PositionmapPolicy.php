<?php

namespace App\Policies\Organization;

use App\Models\Organization\Positionmap;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PositionmapPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the positionmap.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Organization\Positionmap  $positionmap
     * @return mixed
     */
    public function show(User $user, Positionmap $positionmap)
    {
        return $user->hasPermission('show-organization-positionmap');
    }

    /**
     * Determine whether the user can view the positionmap.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Organization\Positionmap  $positionmap
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-organization-positionmap');
    }

    /**
     * Determine whether the user can create positionmaps.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-organization-positionmap');
    }

    /**
     * Determine whether the user can update the positionmap.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Organization\Positionmap  $positionmap
     * @return mixed
     */
    public function update(User $user, Positionmap $positionmap)
    {
        return $user->hasPermission('update-organization-positionmap');
    }

    /**
     * Determine whether the user can delete the positionmap.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Organization\Positionmap  $positionmap
     * @return mixed
     */
    public function delete(User $user, Positionmap $positionmap)
    {
        return $user->hasPermission('delete-organization-positionmap');
    }

    /**
     * Determine whether the user can restore the positionmap.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Organization\Positionmap  $positionmap
     * @return mixed
     */
    public function restore(User $user, Positionmap $positionmap)
    {
        return $user->hasPermission('restore-organization-positionmap');
    }

    /**
     * Determine whether the user can permanently delete the positionmap.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Organization\Positionmap  $positionmap
     * @return mixed
     */
    public function destroy(User $user, Positionmap $positionmap)
    {
        return $user->hasPermission('destroy-organization-positionmap');
    }
}
