<?php

namespace App\Policies\MyProfile;

use App\Models\MyProfile\Biodata;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BiodataPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the biodata.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyProfile\Biodata  $biodata
     * @return mixed
     */
    public function show(User $user, Biodata $biodata)
    {
        return $user->hasPermission('show-myprofile-biodata');
    }

    /**
     * Determine whether the user can view the biodata.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyProfile\Biodata  $biodata
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-myprofile-biodata');
    }

    /**
     * Determine whether the user can create biodatas.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-myprofile-biodata');
    }

    /**
     * Determine whether the user can update the biodata.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyProfile\Biodata  $biodata
     * @return mixed
     */
    public function update(User $user, Biodata $biodata)
    {
        return $user->hasPermission('update-myprofile-biodata');
    }

    /**
     * Determine whether the user can delete the biodata.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyProfile\Biodata  $biodata
     * @return mixed
     */
    public function delete(User $user, Biodata $biodata)
    {
        return $user->hasPermission('delete-myprofile-biodata');
    }

    /**
     * Determine whether the user can restore the biodata.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyProfile\Biodata  $biodata
     * @return mixed
     */
    public function restore(User $user, Biodata $biodata)
    {
        return $user->hasPermission('restore-myprofile-biodata');
    }

    /**
     * Determine whether the user can permanently delete the biodata.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyProfile\Biodata  $biodata
     * @return mixed
     */
    public function destroy(User $user, Biodata $biodata)
    {
        return $user->hasPermission('destroy-myprofile-biodata');
    }
}
