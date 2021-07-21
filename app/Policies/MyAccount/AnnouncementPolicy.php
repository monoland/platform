<?php

namespace App\Policies\MyAccount;

use App\Models\MyAccount\Announcement;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AnnouncementPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the announcement.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyAccount\Announcement  $announcement
     * @return mixed
     */
    public function show(User $user, Announcement $announcement)
    {
        return $user->hasPermission('show-myaccount-announcement');
    }

    /**
     * Determine whether the user can view the announcement.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyAccount\Announcement  $announcement
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-myaccount-announcement');
    }

    /**
     * Determine whether the user can create announcements.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-myaccount-announcement');
    }

    /**
     * Determine whether the user can update the announcement.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyAccount\Announcement  $announcement
     * @return mixed
     */
    public function update(User $user, Announcement $announcement)
    {
        return $user->hasPermission('update-myaccount-announcement');
    }

    /**
     * Determine whether the user can delete the announcement.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyAccount\Announcement  $announcement
     * @return mixed
     */
    public function delete(User $user, Announcement $announcement)
    {
        return $user->hasPermission('delete-myaccount-announcement');
    }

    /**
     * Determine whether the user can restore the announcement.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyAccount\Announcement  $announcement
     * @return mixed
     */
    public function restore(User $user, Announcement $announcement)
    {
        return $user->hasPermission('restore-myaccount-announcement');
    }

    /**
     * Determine whether the user can permanently delete the announcement.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyAccount\Announcement  $announcement
     * @return mixed
     */
    public function destroy(User $user, Announcement $announcement)
    {
        return $user->hasPermission('destroy-myaccount-announcement');
    }
}
