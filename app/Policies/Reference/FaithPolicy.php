<?php

namespace App\Policies\Reference;

use App\Models\Reference\Faith;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FaithPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the faith.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Faith  $faith
     * @return mixed
     */
    public function show(User $user, Faith $faith)
    {
        return $user->hasPermission('show-reference-faith');
    }

    /**
     * Determine whether the user can view the faith.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Faith  $faith
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-reference-faith');
    }

    /**
     * Determine whether the user can create faiths.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-reference-faith');
    }

    /**
     * Determine whether the user can update the faith.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Faith  $faith
     * @return mixed
     */
    public function update(User $user, Faith $faith)
    {
        return $user->hasPermission('update-reference-faith');
    }

    /**
     * Determine whether the user can delete the faith.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Faith  $faith
     * @return mixed
     */
    public function delete(User $user, Faith $faith)
    {
        return $user->hasPermission('delete-reference-faith');
    }

    /**
     * Determine whether the user can restore the faith.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Faith  $faith
     * @return mixed
     */
    public function restore(User $user, Faith $faith)
    {
        return $user->hasPermission('restore-reference-faith');
    }

    /**
     * Determine whether the user can permanently delete the faith.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Faith  $faith
     * @return mixed
     */
    public function destroy(User $user, Faith $faith)
    {
        return $user->hasPermission('destroy-reference-faith');
    }
}
