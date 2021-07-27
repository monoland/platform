<?php

namespace App\Policies\MyService;

use App\Models\MyService\Payincrease;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PayincreasePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the payincrease.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyService\Payincrease  $payincrease
     * @return mixed
     */
    public function show(User $user, Payincrease $payincrease)
    {
        return $user->hasPermission('show-myservice-payincrease');
    }

    /**
     * Determine whether the user can view the payincrease.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyService\Payincrease  $payincrease
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-myservice-payincrease');
    }

    /**
     * Determine whether the user can create payincreases.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-myservice-payincrease');
    }

    /**
     * Determine whether the user can update the payincrease.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyService\Payincrease  $payincrease
     * @return mixed
     */
    public function update(User $user, Payincrease $payincrease)
    {
        return $user->hasPermission('update-myservice-payincrease');
    }

    /**
     * Determine whether the user can delete the payincrease.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyService\Payincrease  $payincrease
     * @return mixed
     */
    public function delete(User $user, Payincrease $payincrease)
    {
        return $user->hasPermission('delete-myservice-payincrease');
    }

    /**
     * Determine whether the user can restore the payincrease.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyService\Payincrease  $payincrease
     * @return mixed
     */
    public function restore(User $user, Payincrease $payincrease)
    {
        return $user->hasPermission('restore-myservice-payincrease');
    }

    /**
     * Determine whether the user can permanently delete the payincrease.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyService\Payincrease  $payincrease
     * @return mixed
     */
    public function destroy(User $user, Payincrease $payincrease)
    {
        return $user->hasPermission('destroy-myservice-payincrease');
    }
}
