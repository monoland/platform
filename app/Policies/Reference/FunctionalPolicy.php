<?php

namespace App\Policies\Reference;

use App\Models\Reference\Functional;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FunctionalPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the functional.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Functional  $functional
     * @return mixed
     */
    public function show(User $user, Functional $functional)
    {
        return $user->hasPermission('show-reference-functional');
    }

    /**
     * Determine whether the user can view the functional.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Functional  $functional
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-reference-functional');
    }

    /**
     * Determine whether the user can create functionals.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-reference-functional');
    }

    /**
     * Determine whether the user can update the functional.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Functional  $functional
     * @return mixed
     */
    public function update(User $user, Functional $functional)
    {
        return $user->hasPermission('update-reference-functional');
    }

    /**
     * Determine whether the user can delete the functional.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Functional  $functional
     * @return mixed
     */
    public function delete(User $user, Functional $functional)
    {
        return $user->hasPermission('delete-reference-functional');
    }

    /**
     * Determine whether the user can restore the functional.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Functional  $functional
     * @return mixed
     */
    public function restore(User $user, Functional $functional)
    {
        return $user->hasPermission('restore-reference-functional');
    }

    /**
     * Determine whether the user can permanently delete the functional.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Functional  $functional
     * @return mixed
     */
    public function destroy(User $user, Functional $functional)
    {
        return $user->hasPermission('destroy-reference-functional');
    }
}
