<?php

namespace App\Policies\Reference;

use App\Models\Reference\Regency;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RegencyPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the regency.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Regency  $regency
     * @return mixed
     */
    public function show(User $user, Regency $regency)
    {
        return $user->hasPermission('show-reference-regency');
    }

    /**
     * Determine whether the user can view the regency.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Regency  $regency
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-reference-regency');
    }

    /**
     * Determine whether the user can create regencies.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-reference-regency');
    }

    /**
     * Determine whether the user can update the regency.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Regency  $regency
     * @return mixed
     */
    public function update(User $user, Regency $regency)
    {
        return $user->hasPermission('update-reference-regency');
    }

    /**
     * Determine whether the user can delete the regency.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Regency  $regency
     * @return mixed
     */
    public function delete(User $user, Regency $regency)
    {
        return $user->hasPermission('delete-reference-regency');
    }

    /**
     * Determine whether the user can restore the regency.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Regency  $regency
     * @return mixed
     */
    public function restore(User $user, Regency $regency)
    {
        return $user->hasPermission('restore-reference-regency');
    }

    /**
     * Determine whether the user can permanently delete the regency.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Regency  $regency
     * @return mixed
     */
    public function destroy(User $user, Regency $regency)
    {
        return $user->hasPermission('destroy-reference-regency');
    }
}
