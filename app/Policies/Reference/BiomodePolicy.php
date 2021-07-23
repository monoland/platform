<?php

namespace App\Policies\Reference;

use App\Models\Reference\Biomode;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BiomodePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the biomode.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Biomode  $biomode
     * @return mixed
     */
    public function show(User $user, Biomode $biomode)
    {
        return $user->hasPermission('show-reference-biomode');
    }

    /**
     * Determine whether the user can view the biomode.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Biomode  $biomode
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-reference-biomode');
    }

    /**
     * Determine whether the user can create biomodes.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-reference-biomode');
    }

    /**
     * Determine whether the user can update the biomode.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Biomode  $biomode
     * @return mixed
     */
    public function update(User $user, Biomode $biomode)
    {
        return $user->hasPermission('update-reference-biomode');
    }

    /**
     * Determine whether the user can delete the biomode.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Biomode  $biomode
     * @return mixed
     */
    public function delete(User $user, Biomode $biomode)
    {
        return $user->hasPermission('delete-reference-biomode');
    }

    /**
     * Determine whether the user can restore the biomode.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Biomode  $biomode
     * @return mixed
     */
    public function restore(User $user, Biomode $biomode)
    {
        return $user->hasPermission('restore-reference-biomode');
    }

    /**
     * Determine whether the user can permanently delete the biomode.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Biomode  $biomode
     * @return mixed
     */
    public function destroy(User $user, Biomode $biomode)
    {
        return $user->hasPermission('destroy-reference-biomode');
    }
}
