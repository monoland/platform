<?php

namespace App\Policies\Reference;

use App\Models\Reference\Edumajor;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EdumajorPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the edumajor.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Edumajor  $edumajor
     * @return mixed
     */
    public function show(User $user, Edumajor $edumajor)
    {
        return $user->hasPermission('show-reference-edumajor');
    }

    /**
     * Determine whether the user can view the edumajor.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Edumajor  $edumajor
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-reference-edumajor');
    }

    /**
     * Determine whether the user can create edumajors.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-reference-edumajor');
    }

    /**
     * Determine whether the user can update the edumajor.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Edumajor  $edumajor
     * @return mixed
     */
    public function update(User $user, Edumajor $edumajor)
    {
        return $user->hasPermission('update-reference-edumajor');
    }

    /**
     * Determine whether the user can delete the edumajor.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Edumajor  $edumajor
     * @return mixed
     */
    public function delete(User $user, Edumajor $edumajor)
    {
        return $user->hasPermission('delete-reference-edumajor');
    }

    /**
     * Determine whether the user can restore the edumajor.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Edumajor  $edumajor
     * @return mixed
     */
    public function restore(User $user, Edumajor $edumajor)
    {
        return $user->hasPermission('restore-reference-edumajor');
    }

    /**
     * Determine whether the user can permanently delete the edumajor.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Edumajor  $edumajor
     * @return mixed
     */
    public function destroy(User $user, Edumajor $edumajor)
    {
        return $user->hasPermission('destroy-reference-edumajor');
    }
}
