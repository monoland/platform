<?php

namespace App\Policies\MyHistory;

use App\Models\MyHistory\Goal;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class GoalPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the goal.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyHistory\Goal  $goal
     * @return mixed
     */
    public function show(User $user, Goal $goal)
    {
        return $user->hasPermission('show-myhistory-goal');
    }

    /**
     * Determine whether the user can view the goal.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyHistory\Goal  $goal
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-myhistory-goal');
    }

    /**
     * Determine whether the user can create goals.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-myhistory-goal');
    }

    /**
     * Determine whether the user can update the goal.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyHistory\Goal  $goal
     * @return mixed
     */
    public function update(User $user, Goal $goal)
    {
        return $user->hasPermission('update-myhistory-goal');
    }

    /**
     * Determine whether the user can delete the goal.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyHistory\Goal  $goal
     * @return mixed
     */
    public function delete(User $user, Goal $goal)
    {
        return $user->hasPermission('delete-myhistory-goal');
    }

    /**
     * Determine whether the user can restore the goal.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyHistory\Goal  $goal
     * @return mixed
     */
    public function restore(User $user, Goal $goal)
    {
        return $user->hasPermission('restore-myhistory-goal');
    }

    /**
     * Determine whether the user can permanently delete the goal.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyHistory\Goal  $goal
     * @return mixed
     */
    public function destroy(User $user, Goal $goal)
    {
        return $user->hasPermission('destroy-myhistory-goal');
    }
}
