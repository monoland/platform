<?php

namespace App\Policies\MyHistory;

use App\Models\MyHistory\Organization;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrganizationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the organization.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyHistory\Organization  $organization
     * @return mixed
     */
    public function show(User $user, Organization $organization)
    {
        return $user->hasPermission('show-myhistory-organization');
    }

    /**
     * Determine whether the user can view the organization.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyHistory\Organization  $organization
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-myhistory-organization');
    }

    /**
     * Determine whether the user can create organizations.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-myhistory-organization');
    }

    /**
     * Determine whether the user can update the organization.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyHistory\Organization  $organization
     * @return mixed
     */
    public function update(User $user, Organization $organization)
    {
        return $user->hasPermission('update-myhistory-organization');
    }

    /**
     * Determine whether the user can delete the organization.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyHistory\Organization  $organization
     * @return mixed
     */
    public function delete(User $user, Organization $organization)
    {
        return $user->hasPermission('delete-myhistory-organization');
    }

    /**
     * Determine whether the user can restore the organization.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyHistory\Organization  $organization
     * @return mixed
     */
    public function restore(User $user, Organization $organization)
    {
        return $user->hasPermission('restore-myhistory-organization');
    }

    /**
     * Determine whether the user can permanently delete the organization.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyHistory\Organization  $organization
     * @return mixed
     */
    public function destroy(User $user, Organization $organization)
    {
        return $user->hasPermission('destroy-myhistory-organization');
    }
}
