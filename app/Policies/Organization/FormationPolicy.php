<?php

namespace App\Policies\Organization;

use App\Models\Organization\Formation;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FormationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the formation.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Organization\Formation  $formation
     * @return mixed
     */
    public function show(User $user, Formation $formation)
    {
        return $user->hasPermission('show-organization-formation');
    }

    /**
     * Determine whether the user can view the formation.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Organization\Formation  $formation
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-organization-formation');
    }

    /**
     * Determine whether the user can create formations.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-organization-formation');
    }

    /**
     * Determine whether the user can update the formation.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Organization\Formation  $formation
     * @return mixed
     */
    public function update(User $user, Formation $formation)
    {
        return $user->hasPermission('update-organization-formation');
    }

    /**
     * Determine whether the user can delete the formation.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Organization\Formation  $formation
     * @return mixed
     */
    public function delete(User $user, Formation $formation)
    {
        return $user->hasPermission('delete-organization-formation');
    }

    /**
     * Determine whether the user can restore the formation.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Organization\Formation  $formation
     * @return mixed
     */
    public function restore(User $user, Formation $formation)
    {
        return $user->hasPermission('restore-organization-formation');
    }

    /**
     * Determine whether the user can permanently delete the formation.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Organization\Formation  $formation
     * @return mixed
     */
    public function destroy(User $user, Formation $formation)
    {
        return $user->hasPermission('destroy-organization-formation');
    }
}
