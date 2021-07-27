<?php

namespace App\Policies\MyHistory;

use App\Models\MyHistory\Paidleave;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PaidleavePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the paidleave.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyHistory\Paidleave  $paidleave
     * @return mixed
     */
    public function show(User $user, Paidleave $paidleave)
    {
        return $user->hasPermission('show-myhistory-paidleave');
    }

    /**
     * Determine whether the user can view the paidleave.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyHistory\Paidleave  $paidleave
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-myhistory-paidleave');
    }

    /**
     * Determine whether the user can create paidleaves.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-myhistory-paidleave');
    }

    /**
     * Determine whether the user can update the paidleave.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyHistory\Paidleave  $paidleave
     * @return mixed
     */
    public function update(User $user, Paidleave $paidleave)
    {
        return $user->hasPermission('update-myhistory-paidleave');
    }

    /**
     * Determine whether the user can delete the paidleave.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyHistory\Paidleave  $paidleave
     * @return mixed
     */
    public function delete(User $user, Paidleave $paidleave)
    {
        return $user->hasPermission('delete-myhistory-paidleave');
    }

    /**
     * Determine whether the user can restore the paidleave.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyHistory\Paidleave  $paidleave
     * @return mixed
     */
    public function restore(User $user, Paidleave $paidleave)
    {
        return $user->hasPermission('restore-myhistory-paidleave');
    }

    /**
     * Determine whether the user can permanently delete the paidleave.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyHistory\Paidleave  $paidleave
     * @return mixed
     */
    public function destroy(User $user, Paidleave $paidleave)
    {
        return $user->hasPermission('destroy-myhistory-paidleave');
    }
}
