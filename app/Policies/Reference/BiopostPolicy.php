<?php

namespace App\Policies\Reference;

use App\Models\Reference\Biopost;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BiopostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the biopost.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Biopost  $biopost
     * @return mixed
     */
    public function show(User $user, Biopost $biopost)
    {
        return $user->hasPermission('show-reference-biopost');
    }

    /**
     * Determine whether the user can view the biopost.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Biopost  $biopost
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-reference-biopost');
    }

    /**
     * Determine whether the user can create bioposts.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-reference-biopost');
    }

    /**
     * Determine whether the user can update the biopost.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Biopost  $biopost
     * @return mixed
     */
    public function update(User $user, Biopost $biopost)
    {
        return $user->hasPermission('update-reference-biopost');
    }

    /**
     * Determine whether the user can delete the biopost.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Biopost  $biopost
     * @return mixed
     */
    public function delete(User $user, Biopost $biopost)
    {
        return $user->hasPermission('delete-reference-biopost');
    }

    /**
     * Determine whether the user can restore the biopost.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Biopost  $biopost
     * @return mixed
     */
    public function restore(User $user, Biopost $biopost)
    {
        return $user->hasPermission('restore-reference-biopost');
    }

    /**
     * Determine whether the user can permanently delete the biopost.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\Biopost  $biopost
     * @return mixed
     */
    public function destroy(User $user, Biopost $biopost)
    {
        return $user->hasPermission('destroy-reference-biopost');
    }
}
