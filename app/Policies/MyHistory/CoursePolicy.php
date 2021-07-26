<?php

namespace App\Policies\MyHistory;

use App\Models\MyHistory\Course;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CoursePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the course.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyHistory\Course  $course
     * @return mixed
     */
    public function show(User $user, Course $course)
    {
        return $user->hasPermission('show-myhistory-course');
    }

    /**
     * Determine whether the user can view the course.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyHistory\Course  $course
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-myhistory-course');
    }

    /**
     * Determine whether the user can create courses.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-myhistory-course');
    }

    /**
     * Determine whether the user can update the course.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyHistory\Course  $course
     * @return mixed
     */
    public function update(User $user, Course $course)
    {
        return $user->hasPermission('update-myhistory-course');
    }

    /**
     * Determine whether the user can delete the course.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyHistory\Course  $course
     * @return mixed
     */
    public function delete(User $user, Course $course)
    {
        return $user->hasPermission('delete-myhistory-course');
    }

    /**
     * Determine whether the user can restore the course.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyHistory\Course  $course
     * @return mixed
     */
    public function restore(User $user, Course $course)
    {
        return $user->hasPermission('restore-myhistory-course');
    }

    /**
     * Determine whether the user can permanently delete the course.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyHistory\Course  $course
     * @return mixed
     */
    public function destroy(User $user, Course $course)
    {
        return $user->hasPermission('destroy-myhistory-course');
    }
}
