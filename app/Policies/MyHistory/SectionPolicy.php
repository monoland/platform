<?php

namespace App\Policies\MyHistory;

use App\Models\MyHistory\Section;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SectionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the section.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyHistory\Section  $section
     * @return mixed
     */
    public function show(User $user, Section $section)
    {
        return $user->hasPermission('show-myhistory-section');
    }

    /**
     * Determine whether the user can view the section.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyHistory\Section  $section
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-myhistory-section');
    }

    /**
     * Determine whether the user can create sections.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-myhistory-section');
    }

    /**
     * Determine whether the user can update the section.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyHistory\Section  $section
     * @return mixed
     */
    public function update(User $user, Section $section)
    {
        return $user->hasPermission('update-myhistory-section');
    }

    /**
     * Determine whether the user can delete the section.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyHistory\Section  $section
     * @return mixed
     */
    public function delete(User $user, Section $section)
    {
        return $user->hasPermission('delete-myhistory-section');
    }

    /**
     * Determine whether the user can restore the section.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyHistory\Section  $section
     * @return mixed
     */
    public function restore(User $user, Section $section)
    {
        return $user->hasPermission('restore-myhistory-section');
    }

    /**
     * Determine whether the user can permanently delete the section.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyHistory\Section  $section
     * @return mixed
     */
    public function destroy(User $user, Section $section)
    {
        return $user->hasPermission('destroy-myhistory-section');
    }
}
