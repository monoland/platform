<?php

namespace App\Policies\Organization;

use App\Models\Organization\Echelonmap;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EchelonmapPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the echelonmap.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Organization\Echelonmap  $echelonmap
     * @return mixed
     */
    public function show(User $user, Echelonmap $echelonmap)
    {
        return $user->hasPermission('show-organization-echelonmap');
    }

    /**
     * Determine whether the user can view the echelonmap.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Organization\Echelonmap  $echelonmap
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-organization-echelonmap');
    }

    /**
     * Determine whether the user can create echelonmaps.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-organization-echelonmap');
    }

    /**
     * Determine whether the user can update the echelonmap.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Organization\Echelonmap  $echelonmap
     * @return mixed
     */
    public function update(User $user, Echelonmap $echelonmap)
    {
        return $user->hasPermission('update-organization-echelonmap');
    }

    /**
     * Determine whether the user can delete the echelonmap.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Organization\Echelonmap  $echelonmap
     * @return mixed
     */
    public function delete(User $user, Echelonmap $echelonmap)
    {
        return $user->hasPermission('delete-organization-echelonmap');
    }

    /**
     * Determine whether the user can restore the echelonmap.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Organization\Echelonmap  $echelonmap
     * @return mixed
     */
    public function restore(User $user, Echelonmap $echelonmap)
    {
        return $user->hasPermission('restore-organization-echelonmap');
    }

    /**
     * Determine whether the user can permanently delete the echelonmap.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Organization\Echelonmap  $echelonmap
     * @return mixed
     */
    public function destroy(User $user, Echelonmap $echelonmap)
    {
        return $user->hasPermission('destroy-organization-echelonmap');
    }
}
