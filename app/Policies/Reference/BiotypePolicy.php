<?php

namespace App\Policies\Reference;

use App\Models\Reference\Biotype;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BiotypePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the biotype.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Biotype  $biotype
     * @return mixed
     */
    public function show(User $user, Biotype $biotype)
    {
        return $user->hasPermission('show-reference-biotype');
    }

    /**
     * Determine whether the user can view the biotype.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Biotype  $biotype
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-reference-biotype');
    }

    /**
     * Determine whether the user can create biotypes.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-reference-biotype');
    }

    /**
     * Determine whether the user can update the biotype.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Biotype  $biotype
     * @return mixed
     */
    public function update(User $user, Biotype $biotype)
    {
        return $user->hasPermission('update-reference-biotype');
    }

    /**
     * Determine whether the user can delete the biotype.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Biotype  $biotype
     * @return mixed
     */
    public function delete(User $user, Biotype $biotype)
    {
        return $user->hasPermission('delete-reference-biotype');
    }

    /**
     * Determine whether the user can restore the biotype.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Biotype  $biotype
     * @return mixed
     */
    public function restore(User $user, Biotype $biotype)
    {
        return $user->hasPermission('restore-reference-biotype');
    }

    /**
     * Determine whether the user can permanently delete the biotype.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Biotype  $biotype
     * @return mixed
     */
    public function destroy(User $user, Biotype $biotype)
    {
        return $user->hasPermission('destroy-reference-biotype');
    }
}
