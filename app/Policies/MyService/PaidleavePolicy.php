<?php

namespace App\Policies\MyService;

use App\Models\MyService\Paidleave;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PaidleavePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the paidleave.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyService\Paidleave  $paidleave
     * @return mixed
     */
    public function show(User $user, Paidleave $paidleave)
    {
        return $user->hasPermission('show-myservice-paidleave');
    }

    /**
     * Determine whether the user can view the paidleave.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyService\Paidleave  $paidleave
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-myservice-paidleave');
    }

    /**
     * Determine whether the user can create paidleaves.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-myservice-paidleave');
    }

    /**
     * Determine whether the user can update the paidleave.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyService\Paidleave  $paidleave
     * @return mixed
     */
    public function update(User $user, Paidleave $paidleave)
    {
        return $user->hasPermission('update-myservice-paidleave');
    }

    /**
     * Determine whether the user can delete the paidleave.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyService\Paidleave  $paidleave
     * @return mixed
     */
    public function delete(User $user, Paidleave $paidleave)
    {
        return $user->hasPermission('delete-myservice-paidleave');
    }

    /**
     * Determine whether the user can restore the paidleave.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyService\Paidleave  $paidleave
     * @return mixed
     */
    public function restore(User $user, Paidleave $paidleave)
    {
        return $user->hasPermission('restore-myservice-paidleave');
    }

    /**
     * Determine whether the user can permanently delete the paidleave.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyService\Paidleave  $paidleave
     * @return mixed
     */
    public function destroy(User $user, Paidleave $paidleave)
    {
        return $user->hasPermission('destroy-myservice-paidleave');
    }
}
