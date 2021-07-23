<?php

namespace App\Policies\Reference;

use App\Models\Reference\EchelonRoom;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EchelonRoomPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the echelon room.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\EchelonRoom  $echelonRoom
     * @return mixed
     */
    public function show(User $user, EchelonRoom $echelonRoom)
    {
        return $user->hasPermission('show-reference-echelon-room');
    }

    /**
     * Determine whether the user can view the echelon room.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\EchelonRoom  $echelonRoom
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-reference-echelon-room');
    }

    /**
     * Determine whether the user can create echelon rooms.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-reference-echelon-room');
    }

    /**
     * Determine whether the user can update the echelon room.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\EchelonRoom  $echelonRoom
     * @return mixed
     */
    public function update(User $user, EchelonRoom $echelonRoom)
    {
        return $user->hasPermission('update-reference-echelon-room');
    }

    /**
     * Determine whether the user can delete the echelon room.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\EchelonRoom  $echelonRoom
     * @return mixed
     */
    public function delete(User $user, EchelonRoom $echelonRoom)
    {
        return $user->hasPermission('delete-reference-echelon-room');
    }

    /**
     * Determine whether the user can restore the echelon room.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\EchelonRoom  $echelonRoom
     * @return mixed
     */
    public function restore(User $user, EchelonRoom $echelonRoom)
    {
        return $user->hasPermission('restore-reference-echelon-room');
    }

    /**
     * Determine whether the user can permanently delete the echelon room.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\EchelonRoom  $echelonRoom
     * @return mixed
     */
    public function destroy(User $user, EchelonRoom $echelonRoom)
    {
        return $user->hasPermission('destroy-reference-echelon-room');
    }
}
