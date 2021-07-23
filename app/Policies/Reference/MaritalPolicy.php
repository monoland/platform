<?php

namespace App\Policies\Reference;

use App\Models\Reference\Marital;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MaritalPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the marital.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Marital  $marital
     * @return mixed
     */
    public function show(User $user, Marital $marital)
    {
        return $user->hasPermission('show-reference-marital');
    }

    /**
     * Determine whether the user can view the marital.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Marital  $marital
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-reference-marital');
    }

    /**
     * Determine whether the user can create maritals.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-reference-marital');
    }

    /**
     * Determine whether the user can update the marital.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Marital  $marital
     * @return mixed
     */
    public function update(User $user, Marital $marital)
    {
        return $user->hasPermission('update-reference-marital');
    }

    /**
     * Determine whether the user can delete the marital.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Marital  $marital
     * @return mixed
     */
    public function delete(User $user, Marital $marital)
    {
        return $user->hasPermission('delete-reference-marital');
    }

    /**
     * Determine whether the user can restore the marital.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Marital  $marital
     * @return mixed
     */
    public function restore(User $user, Marital $marital)
    {
        return $user->hasPermission('restore-reference-marital');
    }

    /**
     * Determine whether the user can permanently delete the marital.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Marital  $marital
     * @return mixed
     */
    public function destroy(User $user, Marital $marital)
    {
        return $user->hasPermission('destroy-reference-marital');
    }
}
