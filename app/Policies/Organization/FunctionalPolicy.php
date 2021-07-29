<?php

namespace App\Policies\Organization;

use App\Models\Organization\Functional;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FunctionalPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the functional.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Organization\Functional  $functional
     * @return mixed
     */
    public function show(User $user, Functional $functional)
    {
        return $user->hasPermission('show-organization-functional');
    }

    /**
     * Determine whether the user can view the functional.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Organization\Functional  $functional
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-organization-functional');
    }

    /**
     * Determine whether the user can create functionals.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-organization-functional');
    }

    /**
     * Determine whether the user can update the functional.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Organization\Functional  $functional
     * @return mixed
     */
    public function update(User $user, Functional $functional)
    {
        return $user->hasPermission('update-organization-functional');
    }

    /**
     * Determine whether the user can delete the functional.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Organization\Functional  $functional
     * @return mixed
     */
    public function delete(User $user, Functional $functional)
    {
        return $user->hasPermission('delete-organization-functional');
    }

    /**
     * Determine whether the user can restore the functional.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Organization\Functional  $functional
     * @return mixed
     */
    public function restore(User $user, Functional $functional)
    {
        return $user->hasPermission('restore-organization-functional');
    }

    /**
     * Determine whether the user can permanently delete the functional.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Organization\Functional  $functional
     * @return mixed
     */
    public function destroy(User $user, Functional $functional)
    {
        return $user->hasPermission('destroy-organization-functional');
    }
}
