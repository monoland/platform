<?php

namespace App\Policies\MyHistory;

use App\Models\MyHistory\Parent;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ParentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the parent.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyHistory\Parent  $parent
     * @return mixed
     */
    public function show(User $user, Parent $parent)
    {
        return $user->hasPermission('show-myhistory-parent');
    }

    /**
     * Determine whether the user can view the parent.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyHistory\Parent  $parent
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-myhistory-parent');
    }

    /**
     * Determine whether the user can create parents.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-myhistory-parent');
    }

    /**
     * Determine whether the user can update the parent.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyHistory\Parent  $parent
     * @return mixed
     */
    public function update(User $user, Parent $parent)
    {
        return $user->hasPermission('update-myhistory-parent');
    }

    /**
     * Determine whether the user can delete the parent.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyHistory\Parent  $parent
     * @return mixed
     */
    public function delete(User $user, Parent $parent)
    {
        return $user->hasPermission('delete-myhistory-parent');
    }

    /**
     * Determine whether the user can restore the parent.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyHistory\Parent  $parent
     * @return mixed
     */
    public function restore(User $user, Parent $parent)
    {
        return $user->hasPermission('restore-myhistory-parent');
    }

    /**
     * Determine whether the user can permanently delete the parent.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyHistory\Parent  $parent
     * @return mixed
     */
    public function destroy(User $user, Parent $parent)
    {
        return $user->hasPermission('destroy-myhistory-parent');
    }
}
