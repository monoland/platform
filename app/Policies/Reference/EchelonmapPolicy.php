<?php

namespace App\Policies\Reference;

use App\Models\Reference\Echelonmap;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EchelonmapPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the echelonmap.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Echelonmap  $echelonmap
     * @return mixed
     */
    public function show(User $user, Echelonmap $echelonmap)
    {
        return $user->hasPermission('show-reference-echelonmap');
    }

    /**
     * Determine whether the user can view the echelonmap.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Echelonmap  $echelonmap
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-reference-echelonmap');
    }

    /**
     * Determine whether the user can create echelonmaps.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-reference-echelonmap');
    }

    /**
     * Determine whether the user can update the echelonmap.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Echelonmap  $echelonmap
     * @return mixed
     */
    public function update(User $user, Echelonmap $echelonmap)
    {
        return $user->hasPermission('update-reference-echelonmap');
    }

    /**
     * Determine whether the user can delete the echelonmap.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Echelonmap  $echelonmap
     * @return mixed
     */
    public function delete(User $user, Echelonmap $echelonmap)
    {
        return $user->hasPermission('delete-reference-echelonmap');
    }

    /**
     * Determine whether the user can restore the echelonmap.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Echelonmap  $echelonmap
     * @return mixed
     */
    public function restore(User $user, Echelonmap $echelonmap)
    {
        return $user->hasPermission('restore-reference-echelonmap');
    }

    /**
     * Determine whether the user can permanently delete the echelonmap.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Echelonmap  $echelonmap
     * @return mixed
     */
    public function destroy(User $user, Echelonmap $echelonmap)
    {
        return $user->hasPermission('destroy-reference-echelonmap');
    }
}
