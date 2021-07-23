<?php

namespace App\Policies\Reference;

use App\Models\Reference\Sector;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SectorPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the sector.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Sector  $sector
     * @return mixed
     */
    public function show(User $user, Sector $sector)
    {
        return $user->hasPermission('show-reference-sector');
    }

    /**
     * Determine whether the user can view the sector.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Sector  $sector
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-reference-sector');
    }

    /**
     * Determine whether the user can create sectors.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-reference-sector');
    }

    /**
     * Determine whether the user can update the sector.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Sector  $sector
     * @return mixed
     */
    public function update(User $user, Sector $sector)
    {
        return $user->hasPermission('update-reference-sector');
    }

    /**
     * Determine whether the user can delete the sector.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Sector  $sector
     * @return mixed
     */
    public function delete(User $user, Sector $sector)
    {
        return $user->hasPermission('delete-reference-sector');
    }

    /**
     * Determine whether the user can restore the sector.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Sector  $sector
     * @return mixed
     */
    public function restore(User $user, Sector $sector)
    {
        return $user->hasPermission('restore-reference-sector');
    }

    /**
     * Determine whether the user can permanently delete the sector.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Sector  $sector
     * @return mixed
     */
    public function destroy(User $user, Sector $sector)
    {
        return $user->hasPermission('destroy-reference-sector');
    }
}
