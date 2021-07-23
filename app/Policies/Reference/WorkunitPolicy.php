<?php

namespace App\Policies\Reference;

use App\Models\Reference\Workunit;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class WorkunitPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the workunit.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Workunit  $workunit
     * @return mixed
     */
    public function show(User $user, Workunit $workunit)
    {
        return $user->hasPermission('show-reference-workunit');
    }

    /**
     * Determine whether the user can view the workunit.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Workunit  $workunit
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-reference-workunit');
    }

    /**
     * Determine whether the user can create workunits.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-reference-workunit');
    }

    /**
     * Determine whether the user can update the workunit.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Workunit  $workunit
     * @return mixed
     */
    public function update(User $user, Workunit $workunit)
    {
        return $user->hasPermission('update-reference-workunit');
    }

    /**
     * Determine whether the user can delete the workunit.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Workunit  $workunit
     * @return mixed
     */
    public function delete(User $user, Workunit $workunit)
    {
        return $user->hasPermission('delete-reference-workunit');
    }

    /**
     * Determine whether the user can restore the workunit.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Workunit  $workunit
     * @return mixed
     */
    public function restore(User $user, Workunit $workunit)
    {
        return $user->hasPermission('restore-reference-workunit');
    }

    /**
     * Determine whether the user can permanently delete the workunit.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Workunit  $workunit
     * @return mixed
     */
    public function destroy(User $user, Workunit $workunit)
    {
        return $user->hasPermission('destroy-reference-workunit');
    }
}
