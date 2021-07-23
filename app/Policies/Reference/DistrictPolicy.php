<?php

namespace App\Policies\Reference;

use App\Models\Reference\District;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DistrictPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the district.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\District  $district
     * @return mixed
     */
    public function show(User $user, District $district)
    {
        return $user->hasPermission('show-reference-district');
    }

    /**
     * Determine whether the user can view the district.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\District  $district
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-reference-district');
    }

    /**
     * Determine whether the user can create districts.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-reference-district');
    }

    /**
     * Determine whether the user can update the district.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\District  $district
     * @return mixed
     */
    public function update(User $user, District $district)
    {
        return $user->hasPermission('update-reference-district');
    }

    /**
     * Determine whether the user can delete the district.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\District  $district
     * @return mixed
     */
    public function delete(User $user, District $district)
    {
        return $user->hasPermission('delete-reference-district');
    }

    /**
     * Determine whether the user can restore the district.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\District  $district
     * @return mixed
     */
    public function restore(User $user, District $district)
    {
        return $user->hasPermission('restore-reference-district');
    }

    /**
     * Determine whether the user can permanently delete the district.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\District  $district
     * @return mixed
     */
    public function destroy(User $user, District $district)
    {
        return $user->hasPermission('destroy-reference-district');
    }
}
