<?php

namespace App\Policies\Reference;

use App\Models\Reference\Postype;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostypePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the postype.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Postype  $postype
     * @return mixed
     */
    public function show(User $user, Postype $postype)
    {
        return $user->hasPermission('show-reference-postype');
    }

    /**
     * Determine whether the user can view the postype.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Postype  $postype
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-reference-postype');
    }

    /**
     * Determine whether the user can create postypes.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-reference-postype');
    }

    /**
     * Determine whether the user can update the postype.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Postype  $postype
     * @return mixed
     */
    public function update(User $user, Postype $postype)
    {
        return $user->hasPermission('update-reference-postype');
    }

    /**
     * Determine whether the user can delete the postype.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Postype  $postype
     * @return mixed
     */
    public function delete(User $user, Postype $postype)
    {
        return $user->hasPermission('delete-reference-postype');
    }

    /**
     * Determine whether the user can restore the postype.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Postype  $postype
     * @return mixed
     */
    public function restore(User $user, Postype $postype)
    {
        return $user->hasPermission('restore-reference-postype');
    }

    /**
     * Determine whether the user can permanently delete the postype.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Postype  $postype
     * @return mixed
     */
    public function destroy(User $user, Postype $postype)
    {
        return $user->hasPermission('destroy-reference-postype');
    }
}
