<?php

namespace App\Policies\Reference;

use App\Models\Reference\Bloodtype;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BloodtypePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the bloodtype.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Bloodtype  $bloodtype
     * @return mixed
     */
    public function show(User $user, Bloodtype $bloodtype)
    {
        return $user->hasPermission('show-reference-bloodtype');
    }

    /**
     * Determine whether the user can view the bloodtype.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Bloodtype  $bloodtype
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-reference-bloodtype');
    }

    /**
     * Determine whether the user can create bloodtypes.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-reference-bloodtype');
    }

    /**
     * Determine whether the user can update the bloodtype.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Bloodtype  $bloodtype
     * @return mixed
     */
    public function update(User $user, Bloodtype $bloodtype)
    {
        return $user->hasPermission('update-reference-bloodtype');
    }

    /**
     * Determine whether the user can delete the bloodtype.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Bloodtype  $bloodtype
     * @return mixed
     */
    public function delete(User $user, Bloodtype $bloodtype)
    {
        return $user->hasPermission('delete-reference-bloodtype');
    }

    /**
     * Determine whether the user can restore the bloodtype.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Bloodtype  $bloodtype
     * @return mixed
     */
    public function restore(User $user, Bloodtype $bloodtype)
    {
        return $user->hasPermission('restore-reference-bloodtype');
    }

    /**
     * Determine whether the user can permanently delete the bloodtype.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Bloodtype  $bloodtype
     * @return mixed
     */
    public function destroy(User $user, Bloodtype $bloodtype)
    {
        return $user->hasPermission('destroy-reference-bloodtype');
    }
}
