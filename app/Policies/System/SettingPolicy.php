<?php

namespace App\Policies\System;

use App\Models\System\Setting;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SettingPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the setting.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\System\Setting  $setting
     * @return mixed
     */
    public function show(User $user, Setting $setting)
    {
        return $user->hasPermission('show-system-setting');
    }

    /**
     * Determine whether the user can view the setting.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\System\Setting  $setting
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-system-setting');
    }

    /**
     * Determine whether the user can create settings.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-system-setting');
    }

    /**
     * Determine whether the user can update the setting.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\System\Setting  $setting
     * @return mixed
     */
    public function update(User $user, Setting $setting)
    {
        return $user->hasPermission('update-system-setting');
    }

    /**
     * Determine whether the user can delete the setting.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\System\Setting  $setting
     * @return mixed
     */
    public function delete(User $user, Setting $setting)
    {
        return $user->hasPermission('delete-system-setting');
    }

    /**
     * Determine whether the user can restore the setting.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\System\Setting  $setting
     * @return mixed
     */
    public function restore(User $user, Setting $setting)
    {
        return $user->hasPermission('restore-system-setting');
    }

    /**
     * Determine whether the user can permanently delete the setting.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\System\Setting  $setting
     * @return mixed
     */
    public function destroy(User $user, Setting $setting)
    {
        return $user->hasPermission('destroy-system-setting');
    }
}
