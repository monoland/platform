<?php

namespace App\Policies\Reference;

use App\Models\Reference\Functionalmap;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FunctionalmapPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the functionalmap.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Functionalmap  $functionalmap
     * @return mixed
     */
    public function show(User $user, Functionalmap $functionalmap)
    {
        return $user->hasPermission('show-reference-functionalmap');
    }

    /**
     * Determine whether the user can view the functionalmap.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Functionalmap  $functionalmap
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-reference-functionalmap');
    }

    /**
     * Determine whether the user can create functionalmaps.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-reference-functionalmap');
    }

    /**
     * Determine whether the user can update the functionalmap.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Functionalmap  $functionalmap
     * @return mixed
     */
    public function update(User $user, Functionalmap $functionalmap)
    {
        return $user->hasPermission('update-reference-functionalmap');
    }

    /**
     * Determine whether the user can delete the functionalmap.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Functionalmap  $functionalmap
     * @return mixed
     */
    public function delete(User $user, Functionalmap $functionalmap)
    {
        return $user->hasPermission('delete-reference-functionalmap');
    }

    /**
     * Determine whether the user can restore the functionalmap.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Functionalmap  $functionalmap
     * @return mixed
     */
    public function restore(User $user, Functionalmap $functionalmap)
    {
        return $user->hasPermission('restore-reference-functionalmap');
    }

    /**
     * Determine whether the user can permanently delete the functionalmap.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Functionalmap  $functionalmap
     * @return mixed
     */
    public function destroy(User $user, Functionalmap $functionalmap)
    {
        return $user->hasPermission('destroy-reference-functionalmap');
    }
}
