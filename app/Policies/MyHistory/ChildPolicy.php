<?php

namespace App\Policies\MyHistory;

use App\Models\MyHistory\Child;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ChildPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the child.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyHistory\Child  $child
     * @return mixed
     */
    public function show(User $user, Child $child)
    {
        return $user->hasPermission('show-myhistory-child');
    }

    /**
     * Determine whether the user can view the child.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyHistory\Child  $child
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-myhistory-child');
    }

    /**
     * Determine whether the user can create children.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-myhistory-child');
    }

    /**
     * Determine whether the user can update the child.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyHistory\Child  $child
     * @return mixed
     */
    public function update(User $user, Child $child)
    {
        return $user->hasPermission('update-myhistory-child');
    }

    /**
     * Determine whether the user can delete the child.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyHistory\Child  $child
     * @return mixed
     */
    public function delete(User $user, Child $child)
    {
        return $user->hasPermission('delete-myhistory-child');
    }

    /**
     * Determine whether the user can restore the child.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyHistory\Child  $child
     * @return mixed
     */
    public function restore(User $user, Child $child)
    {
        return $user->hasPermission('restore-myhistory-child');
    }

    /**
     * Determine whether the user can permanently delete the child.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyHistory\Child  $child
     * @return mixed
     */
    public function destroy(User $user, Child $child)
    {
        return $user->hasPermission('destroy-myhistory-child');
    }
}
