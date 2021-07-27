<?php

namespace App\Policies\MyService;

use App\Models\MyService\Inclusion;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class InclusionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the inclusion.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyService\Inclusion  $inclusion
     * @return mixed
     */
    public function show(User $user, Inclusion $inclusion)
    {
        return $user->hasPermission('show-myservice-inclusion');
    }

    /**
     * Determine whether the user can view the inclusion.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyService\Inclusion  $inclusion
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-myservice-inclusion');
    }

    /**
     * Determine whether the user can create inclusions.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-myservice-inclusion');
    }

    /**
     * Determine whether the user can update the inclusion.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyService\Inclusion  $inclusion
     * @return mixed
     */
    public function update(User $user, Inclusion $inclusion)
    {
        return $user->hasPermission('update-myservice-inclusion');
    }

    /**
     * Determine whether the user can delete the inclusion.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyService\Inclusion  $inclusion
     * @return mixed
     */
    public function delete(User $user, Inclusion $inclusion)
    {
        return $user->hasPermission('delete-myservice-inclusion');
    }

    /**
     * Determine whether the user can restore the inclusion.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyService\Inclusion  $inclusion
     * @return mixed
     */
    public function restore(User $user, Inclusion $inclusion)
    {
        return $user->hasPermission('restore-myservice-inclusion');
    }

    /**
     * Determine whether the user can permanently delete the inclusion.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyService\Inclusion  $inclusion
     * @return mixed
     */
    public function destroy(User $user, Inclusion $inclusion)
    {
        return $user->hasPermission('destroy-myservice-inclusion');
    }
}
