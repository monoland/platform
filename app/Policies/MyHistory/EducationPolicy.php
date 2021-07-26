<?php

namespace App\Policies\MyHistory;

use App\Models\MyHistory\Education;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EducationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the education.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyHistory\Education  $education
     * @return mixed
     */
    public function show(User $user, Education $education)
    {
        return $user->hasPermission('show-myhistory-education');
    }

    /**
     * Determine whether the user can view the education.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyHistory\Education  $education
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-myhistory-education');
    }

    /**
     * Determine whether the user can create education.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-myhistory-education');
    }

    /**
     * Determine whether the user can update the education.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyHistory\Education  $education
     * @return mixed
     */
    public function update(User $user, Education $education)
    {
        return $user->hasPermission('update-myhistory-education');
    }

    /**
     * Determine whether the user can delete the education.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyHistory\Education  $education
     * @return mixed
     */
    public function delete(User $user, Education $education)
    {
        return $user->hasPermission('delete-myhistory-education');
    }

    /**
     * Determine whether the user can restore the education.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyHistory\Education  $education
     * @return mixed
     */
    public function restore(User $user, Education $education)
    {
        return $user->hasPermission('restore-myhistory-education');
    }

    /**
     * Determine whether the user can permanently delete the education.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyHistory\Education  $education
     * @return mixed
     */
    public function destroy(User $user, Education $education)
    {
        return $user->hasPermission('destroy-myhistory-education');
    }
}
