<?php

namespace App\Policies\Reference;

use App\Models\Reference\Postmap;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostmapPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the postmap.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Postmap  $postmap
     * @return mixed
     */
    public function show(User $user, Postmap $postmap)
    {
        return $user->hasPermission('show-reference-postmap');
    }

    /**
     * Determine whether the user can view the postmap.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Postmap  $postmap
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-reference-postmap');
    }

    /**
     * Determine whether the user can create postmaps.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-reference-postmap');
    }

    /**
     * Determine whether the user can update the postmap.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Postmap  $postmap
     * @return mixed
     */
    public function update(User $user, Postmap $postmap)
    {
        return $user->hasPermission('update-reference-postmap');
    }

    /**
     * Determine whether the user can delete the postmap.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Postmap  $postmap
     * @return mixed
     */
    public function delete(User $user, Postmap $postmap)
    {
        return $user->hasPermission('delete-reference-postmap');
    }

    /**
     * Determine whether the user can restore the postmap.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Postmap  $postmap
     * @return mixed
     */
    public function restore(User $user, Postmap $postmap)
    {
        return $user->hasPermission('restore-reference-postmap');
    }

    /**
     * Determine whether the user can permanently delete the postmap.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Postmap  $postmap
     * @return mixed
     */
    public function destroy(User $user, Postmap $postmap)
    {
        return $user->hasPermission('destroy-reference-postmap');
    }
}
