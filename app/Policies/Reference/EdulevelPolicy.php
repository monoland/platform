<?php

namespace App\Policies\Reference;

use App\Models\Reference\Edulevel;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EdulevelPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the edulevel.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Edulevel  $edulevel
     * @return mixed
     */
    public function show(User $user, Edulevel $edulevel)
    {
        return $user->hasPermission('show-reference-edulevel');
    }

    /**
     * Determine whether the user can view the edulevel.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Edulevel  $edulevel
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-reference-edulevel');
    }

    /**
     * Determine whether the user can create edulevels.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-reference-edulevel');
    }

    /**
     * Determine whether the user can update the edulevel.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Edulevel  $edulevel
     * @return mixed
     */
    public function update(User $user, Edulevel $edulevel)
    {
        return $user->hasPermission('update-reference-edulevel');
    }

    /**
     * Determine whether the user can delete the edulevel.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Edulevel  $edulevel
     * @return mixed
     */
    public function delete(User $user, Edulevel $edulevel)
    {
        return $user->hasPermission('delete-reference-edulevel');
    }

    /**
     * Determine whether the user can restore the edulevel.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Edulevel  $edulevel
     * @return mixed
     */
    public function restore(User $user, Edulevel $edulevel)
    {
        return $user->hasPermission('restore-reference-edulevel');
    }

    /**
     * Determine whether the user can permanently delete the edulevel.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Edulevel  $edulevel
     * @return mixed
     */
    public function destroy(User $user, Edulevel $edulevel)
    {
        return $user->hasPermission('destroy-reference-edulevel');
    }
}
