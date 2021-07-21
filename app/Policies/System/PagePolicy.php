<?php

namespace App\Policies\System;

use App\Models\System\Page;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PagePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the page.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\System\Page  $page
     * @return mixed
     */
    public function show(User $user, Page $page)
    {
        return $user->hasPermission('show-system-page');
    }

    /**
     * Determine whether the user can view the page.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\System\Page  $page
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-system-page');
    }

    /**
     * Determine whether the user can create pages.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-system-page');
    }

    /**
     * Determine whether the user can update the page.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\System\Page  $page
     * @return mixed
     */
    public function update(User $user, Page $page)
    {
        return $user->hasPermission('update-system-page');
    }

    /**
     * Determine whether the user can delete the page.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\System\Page  $page
     * @return mixed
     */
    public function delete(User $user, Page $page)
    {
        return $user->hasPermission('delete-system-page');
    }

    /**
     * Determine whether the user can restore the page.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\System\Page  $page
     * @return mixed
     */
    public function restore(User $user, Page $page)
    {
        return $user->hasPermission('restore-system-page');
    }

    /**
     * Determine whether the user can permanently delete the page.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\System\Page  $page
     * @return mixed
     */
    public function destroy(User $user, Page $page)
    {
        return $user->hasPermission('destroy-system-page');
    }
}
