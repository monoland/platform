<?php

namespace App\Policies\Reference;

use App\Models\Reference\Province;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProvincePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the province.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Province  $province
     * @return mixed
     */
    public function show(User $user, Province $province)
    {
        return $user->hasPermission('show-reference-province');
    }

    /**
     * Determine whether the user can view the province.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Province  $province
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-reference-province');
    }

    /**
     * Determine whether the user can create provinces.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-reference-province');
    }

    /**
     * Determine whether the user can update the province.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Province  $province
     * @return mixed
     */
    public function update(User $user, Province $province)
    {
        return $user->hasPermission('update-reference-province');
    }

    /**
     * Determine whether the user can delete the province.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Province  $province
     * @return mixed
     */
    public function delete(User $user, Province $province)
    {
        return $user->hasPermission('delete-reference-province');
    }

    /**
     * Determine whether the user can restore the province.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Province  $province
     * @return mixed
     */
    public function restore(User $user, Province $province)
    {
        return $user->hasPermission('restore-reference-province');
    }

    /**
     * Determine whether the user can permanently delete the province.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Province  $province
     * @return mixed
     */
    public function destroy(User $user, Province $province)
    {
        return $user->hasPermission('destroy-reference-province');
    }
}
