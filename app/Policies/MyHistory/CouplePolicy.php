<?php

namespace App\Policies\MyHistory;

use App\Models\MyHistory\Couple;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CouplePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the couple.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyHistory\Couple  $couple
     * @return mixed
     */
    public function show(User $user, Couple $couple)
    {
        return $user->hasPermission('show-myhistory-couple');
    }

    /**
     * Determine whether the user can view the couple.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyHistory\Couple  $couple
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-myhistory-couple');
    }

    /**
     * Determine whether the user can create couples.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-myhistory-couple');
    }

    /**
     * Determine whether the user can update the couple.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyHistory\Couple  $couple
     * @return mixed
     */
    public function update(User $user, Couple $couple)
    {
        return $user->hasPermission('update-myhistory-couple');
    }

    /**
     * Determine whether the user can delete the couple.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyHistory\Couple  $couple
     * @return mixed
     */
    public function delete(User $user, Couple $couple)
    {
        return $user->hasPermission('delete-myhistory-couple');
    }

    /**
     * Determine whether the user can restore the couple.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyHistory\Couple  $couple
     * @return mixed
     */
    public function restore(User $user, Couple $couple)
    {
        return $user->hasPermission('restore-myhistory-couple');
    }

    /**
     * Determine whether the user can permanently delete the couple.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyHistory\Couple  $couple
     * @return mixed
     */
    public function destroy(User $user, Couple $couple)
    {
        return $user->hasPermission('destroy-myhistory-couple');
    }
}
