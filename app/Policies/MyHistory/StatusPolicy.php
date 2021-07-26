<?php

namespace App\Policies\MyHistory;

use App\Models\MyHistory\Status;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class StatusPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the status.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyHistory\Status  $status
     * @return mixed
     */
    public function show(User $user, Status $status)
    {
        return $user->hasPermission('show-myhistory-status');
    }

    /**
     * Determine whether the user can view the status.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyHistory\Status  $status
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-myhistory-status');
    }

    /**
     * Determine whether the user can create statuses.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-myhistory-status');
    }

    /**
     * Determine whether the user can update the status.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyHistory\Status  $status
     * @return mixed
     */
    public function update(User $user, Status $status)
    {
        return $user->hasPermission('update-myhistory-status');
    }

    /**
     * Determine whether the user can delete the status.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyHistory\Status  $status
     * @return mixed
     */
    public function delete(User $user, Status $status)
    {
        return $user->hasPermission('delete-myhistory-status');
    }

    /**
     * Determine whether the user can restore the status.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyHistory\Status  $status
     * @return mixed
     */
    public function restore(User $user, Status $status)
    {
        return $user->hasPermission('restore-myhistory-status');
    }

    /**
     * Determine whether the user can permanently delete the status.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyHistory\Status  $status
     * @return mixed
     */
    public function destroy(User $user, Status $status)
    {
        return $user->hasPermission('destroy-myhistory-status');
    }
}
