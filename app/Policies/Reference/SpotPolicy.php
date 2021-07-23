<?php

namespace App\Policies\Reference;

use App\Models\Reference\Spot;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SpotPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the spot.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Spot  $spot
     * @return mixed
     */
    public function show(User $user, Spot $spot)
    {
        return $user->hasPermission('show-reference-spot');
    }

    /**
     * Determine whether the user can view the spot.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Spot  $spot
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-reference-spot');
    }

    /**
     * Determine whether the user can create spots.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-reference-spot');
    }

    /**
     * Determine whether the user can update the spot.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Spot  $spot
     * @return mixed
     */
    public function update(User $user, Spot $spot)
    {
        return $user->hasPermission('update-reference-spot');
    }

    /**
     * Determine whether the user can delete the spot.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Spot  $spot
     * @return mixed
     */
    public function delete(User $user, Spot $spot)
    {
        return $user->hasPermission('delete-reference-spot');
    }

    /**
     * Determine whether the user can restore the spot.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Spot  $spot
     * @return mixed
     */
    public function restore(User $user, Spot $spot)
    {
        return $user->hasPermission('restore-reference-spot');
    }

    /**
     * Determine whether the user can permanently delete the spot.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Spot  $spot
     * @return mixed
     */
    public function destroy(User $user, Spot $spot)
    {
        return $user->hasPermission('destroy-reference-spot');
    }
}
