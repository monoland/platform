<?php

namespace App\Policies\Reference;

use App\Models\Reference\Sectionmap;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SectionmapPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the sectionmap.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Sectionmap  $sectionmap
     * @return mixed
     */
    public function show(User $user, Sectionmap $sectionmap)
    {
        return $user->hasPermission('show-reference-sectionmap');
    }

    /**
     * Determine whether the user can view the sectionmap.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Sectionmap  $sectionmap
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-reference-sectionmap');
    }

    /**
     * Determine whether the user can create sectionmaps.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-reference-sectionmap');
    }

    /**
     * Determine whether the user can update the sectionmap.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Sectionmap  $sectionmap
     * @return mixed
     */
    public function update(User $user, Sectionmap $sectionmap)
    {
        return $user->hasPermission('update-reference-sectionmap');
    }

    /**
     * Determine whether the user can delete the sectionmap.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Sectionmap  $sectionmap
     * @return mixed
     */
    public function delete(User $user, Sectionmap $sectionmap)
    {
        return $user->hasPermission('delete-reference-sectionmap');
    }

    /**
     * Determine whether the user can restore the sectionmap.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Sectionmap  $sectionmap
     * @return mixed
     */
    public function restore(User $user, Sectionmap $sectionmap)
    {
        return $user->hasPermission('restore-reference-sectionmap');
    }

    /**
     * Determine whether the user can permanently delete the sectionmap.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Sectionmap  $sectionmap
     * @return mixed
     */
    public function destroy(User $user, Sectionmap $sectionmap)
    {
        return $user->hasPermission('destroy-reference-sectionmap');
    }
}
