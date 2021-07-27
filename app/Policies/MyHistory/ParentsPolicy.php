<?php

namespace App\Policies\MyHistory;

use App\Models\MyHistory\Parents;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ParentsPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the parents.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyHistory\Parents  $parents
     * @return mixed
     */
    public function show(User $user, Parents $parents)
    {
        return $user->hasPermission('show-myhistory-parents');
    }

    /**
     * Determine whether the user can view the parents.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyHistory\Parents  $parents
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-myhistory-parents');
    }

    /**
     * Determine whether the user can create parents.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-myhistory-parents');
    }

    /**
     * Determine whether the user can update the parents.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyHistory\Parents  $parents
     * @return mixed
     */
    public function update(User $user, Parents $parents)
    {
        return $user->hasPermission('update-myhistory-parents');
    }

    /**
     * Determine whether the user can delete the parents.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyHistory\Parents  $parents
     * @return mixed
     */
    public function delete(User $user, Parents $parents)
    {
        return $user->hasPermission('delete-myhistory-parents');
    }

    /**
     * Determine whether the user can restore the parents.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyHistory\Parents  $parents
     * @return mixed
     */
    public function restore(User $user, Parents $parents)
    {
        return $user->hasPermission('restore-myhistory-parents');
    }

    /**
     * Determine whether the user can permanently delete the parents.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyHistory\Parents  $parents
     * @return mixed
     */
    public function destroy(User $user, Parents $parents)
    {
        return $user->hasPermission('destroy-myhistory-parents');
    }
}
