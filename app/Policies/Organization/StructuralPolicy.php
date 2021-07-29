<?php

namespace App\Policies\Organization;

use App\Models\Organization\Structural;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class StructuralPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the structural.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Organization\Structural  $structural
     * @return mixed
     */
    public function show(User $user, Structural $structural)
    {
        return $user->hasPermission('show-organization-structural');
    }

    /**
     * Determine whether the user can view the structural.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Organization\Structural  $structural
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-organization-structural');
    }

    /**
     * Determine whether the user can create structurals.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-organization-structural');
    }

    /**
     * Determine whether the user can update the structural.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Organization\Structural  $structural
     * @return mixed
     */
    public function update(User $user, Structural $structural)
    {
        return $user->hasPermission('update-organization-structural');
    }

    /**
     * Determine whether the user can delete the structural.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Organization\Structural  $structural
     * @return mixed
     */
    public function delete(User $user, Structural $structural)
    {
        return $user->hasPermission('delete-organization-structural');
    }

    /**
     * Determine whether the user can restore the structural.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Organization\Structural  $structural
     * @return mixed
     */
    public function restore(User $user, Structural $structural)
    {
        return $user->hasPermission('restore-organization-structural');
    }

    /**
     * Determine whether the user can permanently delete the structural.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Organization\Structural  $structural
     * @return mixed
     */
    public function destroy(User $user, Structural $structural)
    {
        return $user->hasPermission('destroy-organization-structural');
    }
}
