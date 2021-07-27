<?php

namespace App\Policies\MyService;

use App\Models\MyService\Pension;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PensionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the pension.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyService\Pension  $pension
     * @return mixed
     */
    public function show(User $user, Pension $pension)
    {
        return $user->hasPermission('show-myservice-pension');
    }

    /**
     * Determine whether the user can view the pension.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyService\Pension  $pension
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-myservice-pension');
    }

    /**
     * Determine whether the user can create pensions.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-myservice-pension');
    }

    /**
     * Determine whether the user can update the pension.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyService\Pension  $pension
     * @return mixed
     */
    public function update(User $user, Pension $pension)
    {
        return $user->hasPermission('update-myservice-pension');
    }

    /**
     * Determine whether the user can delete the pension.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyService\Pension  $pension
     * @return mixed
     */
    public function delete(User $user, Pension $pension)
    {
        return $user->hasPermission('delete-myservice-pension');
    }

    /**
     * Determine whether the user can restore the pension.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyService\Pension  $pension
     * @return mixed
     */
    public function restore(User $user, Pension $pension)
    {
        return $user->hasPermission('restore-myservice-pension');
    }

    /**
     * Determine whether the user can permanently delete the pension.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyService\Pension  $pension
     * @return mixed
     */
    public function destroy(User $user, Pension $pension)
    {
        return $user->hasPermission('destroy-myservice-pension');
    }
}
