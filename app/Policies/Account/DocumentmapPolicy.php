<?php

namespace App\Policies\Account;

use App\Models\Account\Documentmap;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DocumentmapPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the documentmap.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Account\Documentmap  $documentmap
     * @return mixed
     */
    public function show(User $user, Documentmap $documentmap)
    {
        return $user->hasPermission('show-account-documentmap');
    }

    /**
     * Determine whether the user can view the documentmap.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Account\Documentmap  $documentmap
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-account-documentmap');
    }

    /**
     * Determine whether the user can create documentmaps.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-account-documentmap');
    }

    /**
     * Determine whether the user can update the documentmap.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Account\Documentmap  $documentmap
     * @return mixed
     */
    public function update(User $user, Documentmap $documentmap)
    {
        return $user->hasPermission('update-account-documentmap');
    }

    /**
     * Determine whether the user can delete the documentmap.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Account\Documentmap  $documentmap
     * @return mixed
     */
    public function delete(User $user, Documentmap $documentmap)
    {
        return $user->hasPermission('delete-account-documentmap');
    }

    /**
     * Determine whether the user can restore the documentmap.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Account\Documentmap  $documentmap
     * @return mixed
     */
    public function restore(User $user, Documentmap $documentmap)
    {
        return $user->hasPermission('restore-account-documentmap');
    }

    /**
     * Determine whether the user can permanently delete the documentmap.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Account\Documentmap  $documentmap
     * @return mixed
     */
    public function destroy(User $user, Documentmap $documentmap)
    {
        return $user->hasPermission('destroy-account-documentmap');
    }
}
