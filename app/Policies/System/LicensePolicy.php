<?php

namespace App\Policies\System;

use App\Models\System\License;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class LicensePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the license.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\System\License  $license
     * @return mixed
     */
    public function show(User $user, License $license)
    {
        return $user->hasPermission('show-system-license');
    }

    /**
     * Determine whether the user can view the license.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\System\License  $license
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-system-license');
    }

    /**
     * Determine whether the user can create licenses.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-system-license');
    }

    /**
     * Determine whether the user can update the license.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\System\License  $license
     * @return mixed
     */
    public function update(User $user, License $license)
    {
        return $user->hasPermission('update-system-license');
    }

    /**
     * Determine whether the user can delete the license.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\System\License  $license
     * @return mixed
     */
    public function delete(User $user, License $license)
    {
        return $user->hasPermission('delete-system-license');
    }

    /**
     * Determine whether the user can restore the license.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\System\License  $license
     * @return mixed
     */
    public function restore(User $user, License $license)
    {
        return $user->hasPermission('restore-system-license');
    }

    /**
     * Determine whether the user can permanently delete the license.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\System\License  $license
     * @return mixed
     */
    public function destroy(User $user, License $license)
    {
        return $user->hasPermission('destroy-system-license');
    }
}
