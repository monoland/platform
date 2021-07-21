<?php

namespace App\Policies\MyAccount;

use App\Models\MyAccount\Notification;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class NotificationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the notification.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyAccount\Notification  $notification
     * @return mixed
     */
    public function show(User $user, Notification $notification)
    {
        return $user->hasPermission('show-myaccount-notification');
    }

    /**
     * Determine whether the user can view the notification.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyAccount\Notification  $notification
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-myaccount-notification');
    }

    /**
     * Determine whether the user can create notifications.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-myaccount-notification');
    }

    /**
     * Determine whether the user can update the notification.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyAccount\Notification  $notification
     * @return mixed
     */
    public function update(User $user, Notification $notification)
    {
        return $user->hasPermission('update-myaccount-notification');
    }

    /**
     * Determine whether the user can delete the notification.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyAccount\Notification  $notification
     * @return mixed
     */
    public function delete(User $user, Notification $notification)
    {
        return $user->hasPermission('delete-myaccount-notification');
    }

    /**
     * Determine whether the user can restore the notification.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyAccount\Notification  $notification
     * @return mixed
     */
    public function restore(User $user, Notification $notification)
    {
        return $user->hasPermission('restore-myaccount-notification');
    }

    /**
     * Determine whether the user can permanently delete the notification.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyAccount\Notification  $notification
     * @return mixed
     */
    public function destroy(User $user, Notification $notification)
    {
        return $user->hasPermission('destroy-myaccount-notification');
    }
}
