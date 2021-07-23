<?php

namespace App\Policies\Reference;

use App\Models\Reference\Section;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SectionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the section.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Section  $section
     * @return mixed
     */
    public function show(User $user, Section $section)
    {
        return $user->hasPermission('show-reference-section');
    }

    /**
     * Determine whether the user can view the section.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Section  $section
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-reference-section');
    }

    /**
     * Determine whether the user can create sections.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-reference-section');
    }

    /**
     * Determine whether the user can update the section.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Section  $section
     * @return mixed
     */
    public function update(User $user, Section $section)
    {
        return $user->hasPermission('update-reference-section');
    }

    /**
     * Determine whether the user can delete the section.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Section  $section
     * @return mixed
     */
    public function delete(User $user, Section $section)
    {
        return $user->hasPermission('delete-reference-section');
    }

    /**
     * Determine whether the user can restore the section.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Section  $section
     * @return mixed
     */
    public function restore(User $user, Section $section)
    {
        return $user->hasPermission('restore-reference-section');
    }

    /**
     * Determine whether the user can permanently delete the section.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Section  $section
     * @return mixed
     */
    public function destroy(User $user, Section $section)
    {
        return $user->hasPermission('destroy-reference-section');
    }
}
