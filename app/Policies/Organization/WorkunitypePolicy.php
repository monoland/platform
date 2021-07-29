<?php

namespace App\Policies\Organization;

use App\Models\Organization\Workunitype;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class WorkunitypePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the workunitype.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Organization\Workunitype  $workunitype
     * @return mixed
     */
    public function show(User $user, Workunitype $workunitype)
    {
        return $user->hasPermission('show-organization-workunitype');
    }

    /**
     * Determine whether the user can view the workunitype.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Organization\Workunitype  $workunitype
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-organization-workunitype');
    }

    /**
     * Determine whether the user can create workunitypes.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-organization-workunitype');
    }

    /**
     * Determine whether the user can update the workunitype.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Organization\Workunitype  $workunitype
     * @return mixed
     */
    public function update(User $user, Workunitype $workunitype)
    {
        return $user->hasPermission('update-organization-workunitype');
    }

    /**
     * Determine whether the user can delete the workunitype.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Organization\Workunitype  $workunitype
     * @return mixed
     */
    public function delete(User $user, Workunitype $workunitype)
    {
        return $user->hasPermission('delete-organization-workunitype');
    }

    /**
     * Determine whether the user can restore the workunitype.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Organization\Workunitype  $workunitype
     * @return mixed
     */
    public function restore(User $user, Workunitype $workunitype)
    {
        return $user->hasPermission('restore-organization-workunitype');
    }

    /**
     * Determine whether the user can permanently delete the workunitype.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Organization\Workunitype  $workunitype
     * @return mixed
     */
    public function destroy(User $user, Workunitype $workunitype)
    {
        return $user->hasPermission('destroy-organization-workunitype');
    }
}
