<?php

namespace App\Policies\Reference;

use App\Models\Reference\Echelon;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EchelonPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the echelon.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Echelon  $echelon
     * @return mixed
     */
    public function show(User $user, Echelon $echelon)
    {
        return $user->hasPermission('show-reference-echelon');
    }

    /**
     * Determine whether the user can view the echelon.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Echelon  $echelon
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-reference-echelon');
    }

    /**
     * Determine whether the user can create echelons.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-reference-echelon');
    }

    /**
     * Determine whether the user can update the echelon.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Echelon  $echelon
     * @return mixed
     */
    public function update(User $user, Echelon $echelon)
    {
        return $user->hasPermission('update-reference-echelon');
    }

    /**
     * Determine whether the user can delete the echelon.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Echelon  $echelon
     * @return mixed
     */
    public function delete(User $user, Echelon $echelon)
    {
        return $user->hasPermission('delete-reference-echelon');
    }

    /**
     * Determine whether the user can restore the echelon.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Echelon  $echelon
     * @return mixed
     */
    public function restore(User $user, Echelon $echelon)
    {
        return $user->hasPermission('restore-reference-echelon');
    }

    /**
     * Determine whether the user can permanently delete the echelon.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Echelon  $echelon
     * @return mixed
     */
    public function destroy(User $user, Echelon $echelon)
    {
        return $user->hasPermission('destroy-reference-echelon');
    }
}
