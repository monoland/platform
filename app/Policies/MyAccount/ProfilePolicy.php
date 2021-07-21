<?php

namespace App\Policies\MyAccount;

use App\Models\MyAccount\Profile;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProfilePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the profile.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyAccount\Profile  $profile
     * @return mixed
     */
    public function show(User $user, Profile $profile)
    {
        return $user->hasPermission('show-myaccount-profile');
    }

    /**
     * Determine whether the user can view the profile.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyAccount\Profile  $profile
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-myaccount-profile');
    }

    /**
     * Determine whether the user can create profiles.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-myaccount-profile');
    }

    /**
     * Determine whether the user can update the profile.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyAccount\Profile  $profile
     * @return mixed
     */
    public function update(User $user, Profile $profile)
    {
        return $user->hasPermission('update-myaccount-profile');
    }

    /**
     * Determine whether the user can delete the profile.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyAccount\Profile  $profile
     * @return mixed
     */
    public function delete(User $user, Profile $profile)
    {
        return $user->hasPermission('delete-myaccount-profile');
    }

    /**
     * Determine whether the user can restore the profile.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyAccount\Profile  $profile
     * @return mixed
     */
    public function restore(User $user, Profile $profile)
    {
        return $user->hasPermission('restore-myaccount-profile');
    }

    /**
     * Determine whether the user can permanently delete the profile.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyAccount\Profile  $profile
     * @return mixed
     */
    public function destroy(User $user, Profile $profile)
    {
        return $user->hasPermission('destroy-myaccount-profile');
    }
}
