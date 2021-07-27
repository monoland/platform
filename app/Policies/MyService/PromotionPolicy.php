<?php

namespace App\Policies\MyService;

use App\Models\MyService\Promotion;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PromotionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the promotion.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyService\Promotion  $promotion
     * @return mixed
     */
    public function show(User $user, Promotion $promotion)
    {
        return $user->hasPermission('show-myservice-promotion');
    }

    /**
     * Determine whether the user can view the promotion.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyService\Promotion  $promotion
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-myservice-promotion');
    }

    /**
     * Determine whether the user can create promotions.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-myservice-promotion');
    }

    /**
     * Determine whether the user can update the promotion.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyService\Promotion  $promotion
     * @return mixed
     */
    public function update(User $user, Promotion $promotion)
    {
        return $user->hasPermission('update-myservice-promotion');
    }

    /**
     * Determine whether the user can delete the promotion.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyService\Promotion  $promotion
     * @return mixed
     */
    public function delete(User $user, Promotion $promotion)
    {
        return $user->hasPermission('delete-myservice-promotion');
    }

    /**
     * Determine whether the user can restore the promotion.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyService\Promotion  $promotion
     * @return mixed
     */
    public function restore(User $user, Promotion $promotion)
    {
        return $user->hasPermission('restore-myservice-promotion');
    }

    /**
     * Determine whether the user can permanently delete the promotion.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyService\Promotion  $promotion
     * @return mixed
     */
    public function destroy(User $user, Promotion $promotion)
    {
        return $user->hasPermission('destroy-myservice-promotion');
    }
}
