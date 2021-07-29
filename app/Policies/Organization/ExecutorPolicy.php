<?php

namespace App\Policies\Organization;

use App\Models\Organization\Executor;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ExecutorPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the executor.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Organization\Executor  $executor
     * @return mixed
     */
    public function show(User $user, Executor $executor)
    {
        return $user->hasPermission('show-organization-executor');
    }

    /**
     * Determine whether the user can view the executor.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Organization\Executor  $executor
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-organization-executor');
    }

    /**
     * Determine whether the user can create executors.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-organization-executor');
    }

    /**
     * Determine whether the user can update the executor.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Organization\Executor  $executor
     * @return mixed
     */
    public function update(User $user, Executor $executor)
    {
        return $user->hasPermission('update-organization-executor');
    }

    /**
     * Determine whether the user can delete the executor.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Organization\Executor  $executor
     * @return mixed
     */
    public function delete(User $user, Executor $executor)
    {
        return $user->hasPermission('delete-organization-executor');
    }

    /**
     * Determine whether the user can restore the executor.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Organization\Executor  $executor
     * @return mixed
     */
    public function restore(User $user, Executor $executor)
    {
        return $user->hasPermission('restore-organization-executor');
    }

    /**
     * Determine whether the user can permanently delete the executor.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Organization\Executor  $executor
     * @return mixed
     */
    public function destroy(User $user, Executor $executor)
    {
        return $user->hasPermission('destroy-organization-executor');
    }
}
