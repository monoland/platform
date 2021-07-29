<?php

namespace App\Policies\Organization;

use App\Models\Organization\Functionalstage;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FunctionalstagePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the functionalstage.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Organization\Functionalstage  $functionalstage
     * @return mixed
     */
    public function show(User $user, Functionalstage $functionalstage)
    {
        return $user->hasPermission('show-organization-functionalstage');
    }

    /**
     * Determine whether the user can view the functionalstage.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Organization\Functionalstage  $functionalstage
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-organization-functionalstage');
    }

    /**
     * Determine whether the user can create functionalstages.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-organization-functionalstage');
    }

    /**
     * Determine whether the user can update the functionalstage.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Organization\Functionalstage  $functionalstage
     * @return mixed
     */
    public function update(User $user, Functionalstage $functionalstage)
    {
        return $user->hasPermission('update-organization-functionalstage');
    }

    /**
     * Determine whether the user can delete the functionalstage.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Organization\Functionalstage  $functionalstage
     * @return mixed
     */
    public function delete(User $user, Functionalstage $functionalstage)
    {
        return $user->hasPermission('delete-organization-functionalstage');
    }

    /**
     * Determine whether the user can restore the functionalstage.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Organization\Functionalstage  $functionalstage
     * @return mixed
     */
    public function restore(User $user, Functionalstage $functionalstage)
    {
        return $user->hasPermission('restore-organization-functionalstage');
    }

    /**
     * Determine whether the user can permanently delete the functionalstage.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Organization\Functionalstage  $functionalstage
     * @return mixed
     */
    public function destroy(User $user, Functionalstage $functionalstage)
    {
        return $user->hasPermission('destroy-organization-functionalstage');
    }
}
