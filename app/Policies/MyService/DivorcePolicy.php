<?php

namespace App\Policies\MyService;

use App\Models\MyService\Divorce;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DivorcePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the divorce.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyService\Divorce  $divorce
     * @return mixed
     */
    public function show(User $user, Divorce $divorce)
    {
        return $user->hasPermission('show-myservice-divorce');
    }

    /**
     * Determine whether the user can view the divorce.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyService\Divorce  $divorce
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-myservice-divorce');
    }

    /**
     * Determine whether the user can create divorces.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-myservice-divorce');
    }

    /**
     * Determine whether the user can update the divorce.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyService\Divorce  $divorce
     * @return mixed
     */
    public function update(User $user, Divorce $divorce)
    {
        return $user->hasPermission('update-myservice-divorce');
    }

    /**
     * Determine whether the user can delete the divorce.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyService\Divorce  $divorce
     * @return mixed
     */
    public function delete(User $user, Divorce $divorce)
    {
        return $user->hasPermission('delete-myservice-divorce');
    }

    /**
     * Determine whether the user can restore the divorce.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyService\Divorce  $divorce
     * @return mixed
     */
    public function restore(User $user, Divorce $divorce)
    {
        return $user->hasPermission('restore-myservice-divorce');
    }

    /**
     * Determine whether the user can permanently delete the divorce.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyService\Divorce  $divorce
     * @return mixed
     */
    public function destroy(User $user, Divorce $divorce)
    {
        return $user->hasPermission('destroy-myservice-divorce');
    }
}
