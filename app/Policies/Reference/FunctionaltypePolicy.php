<?php

namespace App\Policies\Reference;

use App\Models\Reference\Functionaltype;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FunctionaltypePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the functionaltype.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Functionaltype  $functionaltype
     * @return mixed
     */
    public function show(User $user, Functionaltype $functionaltype)
    {
        return $user->hasPermission('show-reference-functionaltype');
    }

    /**
     * Determine whether the user can view the functionaltype.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Functionaltype  $functionaltype
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-reference-functionaltype');
    }

    /**
     * Determine whether the user can create functionaltypes.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-reference-functionaltype');
    }

    /**
     * Determine whether the user can update the functionaltype.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Functionaltype  $functionaltype
     * @return mixed
     */
    public function update(User $user, Functionaltype $functionaltype)
    {
        return $user->hasPermission('update-reference-functionaltype');
    }

    /**
     * Determine whether the user can delete the functionaltype.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Functionaltype  $functionaltype
     * @return mixed
     */
    public function delete(User $user, Functionaltype $functionaltype)
    {
        return $user->hasPermission('delete-reference-functionaltype');
    }

    /**
     * Determine whether the user can restore the functionaltype.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Functionaltype  $functionaltype
     * @return mixed
     */
    public function restore(User $user, Functionaltype $functionaltype)
    {
        return $user->hasPermission('restore-reference-functionaltype');
    }

    /**
     * Determine whether the user can permanently delete the functionaltype.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Functionaltype  $functionaltype
     * @return mixed
     */
    public function destroy(User $user, Functionaltype $functionaltype)
    {
        return $user->hasPermission('destroy-reference-functionaltype');
    }
}
