<?php

namespace App\Policies\Reference;

use App\Models\Reference\Structural;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class StructuralPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the structural.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Structural  $structural
     * @return mixed
     */
    public function show(User $user, Structural $structural)
    {
        return $user->hasPermission('show-reference-structural');
    }

    /**
     * Determine whether the user can view the structural.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Structural  $structural
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-reference-structural');
    }

    /**
     * Determine whether the user can create structurals.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-reference-structural');
    }

    /**
     * Determine whether the user can update the structural.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Structural  $structural
     * @return mixed
     */
    public function update(User $user, Structural $structural)
    {
        return $user->hasPermission('update-reference-structural');
    }

    /**
     * Determine whether the user can delete the structural.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Structural  $structural
     * @return mixed
     */
    public function delete(User $user, Structural $structural)
    {
        return $user->hasPermission('delete-reference-structural');
    }

    /**
     * Determine whether the user can restore the structural.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Structural  $structural
     * @return mixed
     */
    public function restore(User $user, Structural $structural)
    {
        return $user->hasPermission('restore-reference-structural');
    }

    /**
     * Determine whether the user can permanently delete the structural.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Structural  $structural
     * @return mixed
     */
    public function destroy(User $user, Structural $structural)
    {
        return $user->hasPermission('destroy-reference-structural');
    }
}
