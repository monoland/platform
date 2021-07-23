<?php

namespace App\Policies\Reference;

use App\Models\Reference\Grade;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class GradePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the grade.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Grade  $grade
     * @return mixed
     */
    public function show(User $user, Grade $grade)
    {
        return $user->hasPermission('show-reference-grade');
    }

    /**
     * Determine whether the user can view the grade.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Grade  $grade
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-reference-grade');
    }

    /**
     * Determine whether the user can create grades.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-reference-grade');
    }

    /**
     * Determine whether the user can update the grade.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Grade  $grade
     * @return mixed
     */
    public function update(User $user, Grade $grade)
    {
        return $user->hasPermission('update-reference-grade');
    }

    /**
     * Determine whether the user can delete the grade.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Grade  $grade
     * @return mixed
     */
    public function delete(User $user, Grade $grade)
    {
        return $user->hasPermission('delete-reference-grade');
    }

    /**
     * Determine whether the user can restore the grade.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Grade  $grade
     * @return mixed
     */
    public function restore(User $user, Grade $grade)
    {
        return $user->hasPermission('restore-reference-grade');
    }

    /**
     * Determine whether the user can permanently delete the grade.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Grade  $grade
     * @return mixed
     */
    public function destroy(User $user, Grade $grade)
    {
        return $user->hasPermission('destroy-reference-grade');
    }
}
