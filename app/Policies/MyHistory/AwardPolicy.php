<?php

namespace App\Policies\MyHistory;

use App\Models\MyHistory\Award;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AwardPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the award.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyHistory\Award  $award
     * @return mixed
     */
    public function show(User $user, Award $award)
    {
        return $user->hasPermission('show-myhistory-award');
    }

    /**
     * Determine whether the user can view the award.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyHistory\Award  $award
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-myhistory-award');
    }

    /**
     * Determine whether the user can create awards.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-myhistory-award');
    }

    /**
     * Determine whether the user can update the award.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyHistory\Award  $award
     * @return mixed
     */
    public function update(User $user, Award $award)
    {
        return $user->hasPermission('update-myhistory-award');
    }

    /**
     * Determine whether the user can delete the award.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyHistory\Award  $award
     * @return mixed
     */
    public function delete(User $user, Award $award)
    {
        return $user->hasPermission('delete-myhistory-award');
    }

    /**
     * Determine whether the user can restore the award.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyHistory\Award  $award
     * @return mixed
     */
    public function restore(User $user, Award $award)
    {
        return $user->hasPermission('restore-myhistory-award');
    }

    /**
     * Determine whether the user can permanently delete the award.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyHistory\Award  $award
     * @return mixed
     */
    public function destroy(User $user, Award $award)
    {
        return $user->hasPermission('destroy-myhistory-award');
    }
}
