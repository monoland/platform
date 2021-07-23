<?php

namespace App\Policies\Reference;

use App\Models\Reference\Expertise;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ExpertisePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the expertise.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Expertise  $expertise
     * @return mixed
     */
    public function show(User $user, Expertise $expertise)
    {
        return $user->hasPermission('show-reference-expertise');
    }

    /**
     * Determine whether the user can view the expertise.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Expertise  $expertise
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-reference-expertise');
    }

    /**
     * Determine whether the user can create expertises.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-reference-expertise');
    }

    /**
     * Determine whether the user can update the expertise.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Expertise  $expertise
     * @return mixed
     */
    public function update(User $user, Expertise $expertise)
    {
        return $user->hasPermission('update-reference-expertise');
    }

    /**
     * Determine whether the user can delete the expertise.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Expertise  $expertise
     * @return mixed
     */
    public function delete(User $user, Expertise $expertise)
    {
        return $user->hasPermission('delete-reference-expertise');
    }

    /**
     * Determine whether the user can restore the expertise.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Expertise  $expertise
     * @return mixed
     */
    public function restore(User $user, Expertise $expertise)
    {
        return $user->hasPermission('restore-reference-expertise');
    }

    /**
     * Determine whether the user can permanently delete the expertise.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Expertise  $expertise
     * @return mixed
     */
    public function destroy(User $user, Expertise $expertise)
    {
        return $user->hasPermission('destroy-reference-expertise');
    }
}
