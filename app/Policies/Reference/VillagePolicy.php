<?php

namespace App\Policies\Reference;

use App\Models\Reference\Village;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class VillagePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the village.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Village  $village
     * @return mixed
     */
    public function show(User $user, Village $village)
    {
        return $user->hasPermission('show-reference-village');
    }

    /**
     * Determine whether the user can view the village.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Village  $village
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-reference-village');
    }

    /**
     * Determine whether the user can create villages.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-reference-village');
    }

    /**
     * Determine whether the user can update the village.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Village  $village
     * @return mixed
     */
    public function update(User $user, Village $village)
    {
        return $user->hasPermission('update-reference-village');
    }

    /**
     * Determine whether the user can delete the village.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Village  $village
     * @return mixed
     */
    public function delete(User $user, Village $village)
    {
        return $user->hasPermission('delete-reference-village');
    }

    /**
     * Determine whether the user can restore the village.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Village  $village
     * @return mixed
     */
    public function restore(User $user, Village $village)
    {
        return $user->hasPermission('restore-reference-village');
    }

    /**
     * Determine whether the user can permanently delete the village.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Village  $village
     * @return mixed
     */
    public function destroy(User $user, Village $village)
    {
        return $user->hasPermission('destroy-reference-village');
    }
}
