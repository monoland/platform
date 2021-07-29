<?php

namespace App\Policies\Organization;

use App\Models\Organization\Functionalgrade;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FunctionalgradePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the functionalgrade.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Organization\Functionalgrade  $functionalgrade
     * @return mixed
     */
    public function show(User $user, Functionalgrade $functionalgrade)
    {
        return $user->hasPermission('show-organization-functionalgrade');
    }

    /**
     * Determine whether the user can view the functionalgrade.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Organization\Functionalgrade  $functionalgrade
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-organization-functionalgrade');
    }

    /**
     * Determine whether the user can create functionalgrades.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-organization-functionalgrade');
    }

    /**
     * Determine whether the user can update the functionalgrade.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Organization\Functionalgrade  $functionalgrade
     * @return mixed
     */
    public function update(User $user, Functionalgrade $functionalgrade)
    {
        return $user->hasPermission('update-organization-functionalgrade');
    }

    /**
     * Determine whether the user can delete the functionalgrade.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Organization\Functionalgrade  $functionalgrade
     * @return mixed
     */
    public function delete(User $user, Functionalgrade $functionalgrade)
    {
        return $user->hasPermission('delete-organization-functionalgrade');
    }

    /**
     * Determine whether the user can restore the functionalgrade.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Organization\Functionalgrade  $functionalgrade
     * @return mixed
     */
    public function restore(User $user, Functionalgrade $functionalgrade)
    {
        return $user->hasPermission('restore-organization-functionalgrade');
    }

    /**
     * Determine whether the user can permanently delete the functionalgrade.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Organization\Functionalgrade  $functionalgrade
     * @return mixed
     */
    public function destroy(User $user, Functionalgrade $functionalgrade)
    {
        return $user->hasPermission('destroy-organization-functionalgrade');
    }
}
