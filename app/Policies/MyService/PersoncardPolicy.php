<?php

namespace App\Policies\MyService;

use App\Models\MyService\Personcard;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PersoncardPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the personcard.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyService\Personcard  $personcard
     * @return mixed
     */
    public function show(User $user, Personcard $personcard)
    {
        return $user->hasPermission('show-myservice-personcard');
    }

    /**
     * Determine whether the user can view the personcard.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyService\Personcard  $personcard
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-myservice-personcard');
    }

    /**
     * Determine whether the user can create personcards.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-myservice-personcard');
    }

    /**
     * Determine whether the user can update the personcard.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyService\Personcard  $personcard
     * @return mixed
     */
    public function update(User $user, Personcard $personcard)
    {
        return $user->hasPermission('update-myservice-personcard');
    }

    /**
     * Determine whether the user can delete the personcard.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyService\Personcard  $personcard
     * @return mixed
     */
    public function delete(User $user, Personcard $personcard)
    {
        return $user->hasPermission('delete-myservice-personcard');
    }

    /**
     * Determine whether the user can restore the personcard.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyService\Personcard  $personcard
     * @return mixed
     */
    public function restore(User $user, Personcard $personcard)
    {
        return $user->hasPermission('restore-myservice-personcard');
    }

    /**
     * Determine whether the user can permanently delete the personcard.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyService\Personcard  $personcard
     * @return mixed
     */
    public function destroy(User $user, Personcard $personcard)
    {
        return $user->hasPermission('destroy-myservice-personcard');
    }
}
