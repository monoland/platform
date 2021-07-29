<?php

namespace App\Policies\Organization;

use App\Models\Organization\Composition;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CompositionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the composition.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Organization\Composition  $composition
     * @return mixed
     */
    public function show(User $user, Composition $composition)
    {
        return $user->hasPermission('show-organization-composition');
    }

    /**
     * Determine whether the user can view the composition.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Organization\Composition  $composition
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-organization-composition');
    }

    /**
     * Determine whether the user can create compositions.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-organization-composition');
    }

    /**
     * Determine whether the user can update the composition.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Organization\Composition  $composition
     * @return mixed
     */
    public function update(User $user, Composition $composition)
    {
        return $user->hasPermission('update-organization-composition');
    }

    /**
     * Determine whether the user can delete the composition.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Organization\Composition  $composition
     * @return mixed
     */
    public function delete(User $user, Composition $composition)
    {
        return $user->hasPermission('delete-organization-composition');
    }

    /**
     * Determine whether the user can restore the composition.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Organization\Composition  $composition
     * @return mixed
     */
    public function restore(User $user, Composition $composition)
    {
        return $user->hasPermission('restore-organization-composition');
    }

    /**
     * Determine whether the user can permanently delete the composition.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Organization\Composition  $composition
     * @return mixed
     */
    public function destroy(User $user, Composition $composition)
    {
        return $user->hasPermission('destroy-organization-composition');
    }
}
