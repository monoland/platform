<?php

namespace App\Policies\Reference;

use App\Models\Reference\Worktype;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class WorktypePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the worktype.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Worktype  $worktype
     * @return mixed
     */
    public function show(User $user, Worktype $worktype)
    {
        return $user->hasPermission('show-reference-worktype');
    }

    /**
     * Determine whether the user can view the worktype.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Worktype  $worktype
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-reference-worktype');
    }

    /**
     * Determine whether the user can create worktypes.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-reference-worktype');
    }

    /**
     * Determine whether the user can update the worktype.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Worktype  $worktype
     * @return mixed
     */
    public function update(User $user, Worktype $worktype)
    {
        return $user->hasPermission('update-reference-worktype');
    }

    /**
     * Determine whether the user can delete the worktype.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Worktype  $worktype
     * @return mixed
     */
    public function delete(User $user, Worktype $worktype)
    {
        return $user->hasPermission('delete-reference-worktype');
    }

    /**
     * Determine whether the user can restore the worktype.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Worktype  $worktype
     * @return mixed
     */
    public function restore(User $user, Worktype $worktype)
    {
        return $user->hasPermission('restore-reference-worktype');
    }

    /**
     * Determine whether the user can permanently delete the worktype.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Worktype  $worktype
     * @return mixed
     */
    public function destroy(User $user, Worktype $worktype)
    {
        return $user->hasPermission('destroy-reference-worktype');
    }
}
