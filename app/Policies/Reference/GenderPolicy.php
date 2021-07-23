<?php

namespace App\Policies\Reference;

use App\Models\Reference\Gender;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class GenderPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the gender.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Gender  $gender
     * @return mixed
     */
    public function show(User $user, Gender $gender)
    {
        return $user->hasPermission('show-reference-gender');
    }

    /**
     * Determine whether the user can view the gender.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Gender  $gender
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-reference-gender');
    }

    /**
     * Determine whether the user can create genders.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-reference-gender');
    }

    /**
     * Determine whether the user can update the gender.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Gender  $gender
     * @return mixed
     */
    public function update(User $user, Gender $gender)
    {
        return $user->hasPermission('update-reference-gender');
    }

    /**
     * Determine whether the user can delete the gender.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Gender  $gender
     * @return mixed
     */
    public function delete(User $user, Gender $gender)
    {
        return $user->hasPermission('delete-reference-gender');
    }

    /**
     * Determine whether the user can restore the gender.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Gender  $gender
     * @return mixed
     */
    public function restore(User $user, Gender $gender)
    {
        return $user->hasPermission('restore-reference-gender');
    }

    /**
     * Determine whether the user can permanently delete the gender.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Gender  $gender
     * @return mixed
     */
    public function destroy(User $user, Gender $gender)
    {
        return $user->hasPermission('destroy-reference-gender');
    }
}
