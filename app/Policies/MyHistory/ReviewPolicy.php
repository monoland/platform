<?php

namespace App\Policies\MyHistory;

use App\Models\MyHistory\Review;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReviewPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the review.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyHistory\Review  $review
     * @return mixed
     */
    public function show(User $user, Review $review)
    {
        return $user->hasPermission('show-myhistory-review');
    }

    /**
     * Determine whether the user can view the review.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyHistory\Review  $review
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-myhistory-review');
    }

    /**
     * Determine whether the user can create reviews.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-myhistory-review');
    }

    /**
     * Determine whether the user can update the review.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyHistory\Review  $review
     * @return mixed
     */
    public function update(User $user, Review $review)
    {
        return $user->hasPermission('update-myhistory-review');
    }

    /**
     * Determine whether the user can delete the review.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyHistory\Review  $review
     * @return mixed
     */
    public function delete(User $user, Review $review)
    {
        return $user->hasPermission('delete-myhistory-review');
    }

    /**
     * Determine whether the user can restore the review.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyHistory\Review  $review
     * @return mixed
     */
    public function restore(User $user, Review $review)
    {
        return $user->hasPermission('restore-myhistory-review');
    }

    /**
     * Determine whether the user can permanently delete the review.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyHistory\Review  $review
     * @return mixed
     */
    public function destroy(User $user, Review $review)
    {
        return $user->hasPermission('destroy-myhistory-review');
    }
}
