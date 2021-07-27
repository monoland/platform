<?php

namespace App\Policies\MyService;

use App\Models\MyService\Couplecard;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CouplecardPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the couplecard.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyService\Couplecard  $couplecard
     * @return mixed
     */
    public function show(User $user, Couplecard $couplecard)
    {
        return $user->hasPermission('show-myservice-couplecard');
    }

    /**
     * Determine whether the user can view the couplecard.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyService\Couplecard  $couplecard
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-myservice-couplecard');
    }

    /**
     * Determine whether the user can create couplecards.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-myservice-couplecard');
    }

    /**
     * Determine whether the user can update the couplecard.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyService\Couplecard  $couplecard
     * @return mixed
     */
    public function update(User $user, Couplecard $couplecard)
    {
        return $user->hasPermission('update-myservice-couplecard');
    }

    /**
     * Determine whether the user can delete the couplecard.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyService\Couplecard  $couplecard
     * @return mixed
     */
    public function delete(User $user, Couplecard $couplecard)
    {
        return $user->hasPermission('delete-myservice-couplecard');
    }

    /**
     * Determine whether the user can restore the couplecard.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyService\Couplecard  $couplecard
     * @return mixed
     */
    public function restore(User $user, Couplecard $couplecard)
    {
        return $user->hasPermission('restore-myservice-couplecard');
    }

    /**
     * Determine whether the user can permanently delete the couplecard.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyService\Couplecard  $couplecard
     * @return mixed
     */
    public function destroy(User $user, Couplecard $couplecard)
    {
        return $user->hasPermission('destroy-myservice-couplecard');
    }
}
