<?php

namespace App\Policies\Organization;

use App\Models\Organization\Functionalexpert;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FunctionalexpertPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the functionalexpert.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Organization\Functionalexpert  $functionalexpert
     * @return mixed
     */
    public function show(User $user, Functionalexpert $functionalexpert)
    {
        return $user->hasPermission('show-organization-functionalexpert');
    }

    /**
     * Determine whether the user can view the functionalexpert.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Organization\Functionalexpert  $functionalexpert
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-organization-functionalexpert');
    }

    /**
     * Determine whether the user can create functionalexperts.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-organization-functionalexpert');
    }

    /**
     * Determine whether the user can update the functionalexpert.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Organization\Functionalexpert  $functionalexpert
     * @return mixed
     */
    public function update(User $user, Functionalexpert $functionalexpert)
    {
        return $user->hasPermission('update-organization-functionalexpert');
    }

    /**
     * Determine whether the user can delete the functionalexpert.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Organization\Functionalexpert  $functionalexpert
     * @return mixed
     */
    public function delete(User $user, Functionalexpert $functionalexpert)
    {
        return $user->hasPermission('delete-organization-functionalexpert');
    }

    /**
     * Determine whether the user can restore the functionalexpert.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Organization\Functionalexpert  $functionalexpert
     * @return mixed
     */
    public function restore(User $user, Functionalexpert $functionalexpert)
    {
        return $user->hasPermission('restore-organization-functionalexpert');
    }

    /**
     * Determine whether the user can permanently delete the functionalexpert.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Organization\Functionalexpert  $functionalexpert
     * @return mixed
     */
    public function destroy(User $user, Functionalexpert $functionalexpert)
    {
        return $user->hasPermission('destroy-organization-functionalexpert');
    }
}
