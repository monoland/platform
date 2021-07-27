<?php

namespace App\Policies\Reference;

use App\Models\Reference\Positionmap;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PositionmapPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the positionmap.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Positionmap  $positionmap
     * @return mixed
     */
    public function show(User $user, Positionmap $positionmap)
    {
        return $user->hasPermission('show-reference-positionmap');
    }

    /**
     * Determine whether the user can view the positionmap.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Positionmap  $positionmap
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-reference-positionmap');
    }

    /**
     * Determine whether the user can create positionmaps.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-reference-positionmap');
    }

    /**
     * Determine whether the user can update the positionmap.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Positionmap  $positionmap
     * @return mixed
     */
    public function update(User $user, Positionmap $positionmap)
    {
        return $user->hasPermission('update-reference-positionmap');
    }

    /**
     * Determine whether the user can delete the positionmap.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Positionmap  $positionmap
     * @return mixed
     */
    public function delete(User $user, Positionmap $positionmap)
    {
        return $user->hasPermission('delete-reference-positionmap');
    }

    /**
     * Determine whether the user can restore the positionmap.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Positionmap  $positionmap
     * @return mixed
     */
    public function restore(User $user, Positionmap $positionmap)
    {
        return $user->hasPermission('restore-reference-positionmap');
    }

    /**
     * Determine whether the user can permanently delete the positionmap.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Positionmap  $positionmap
     * @return mixed
     */
    public function destroy(User $user, Positionmap $positionmap)
    {
        return $user->hasPermission('destroy-reference-positionmap');
    }
}
