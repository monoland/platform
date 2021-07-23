<?php

namespace App\Policies\Reference;

use App\Models\Reference\SectionRoom;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SectionRoomPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the section room.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\SectionRoom  $sectionRoom
     * @return mixed
     */
    public function show(User $user, SectionRoom $sectionRoom)
    {
        return $user->hasPermission('show-reference-section-room');
    }

    /**
     * Determine whether the user can view the section room.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\SectionRoom  $sectionRoom
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-reference-section-room');
    }

    /**
     * Determine whether the user can create section rooms.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-reference-section-room');
    }

    /**
     * Determine whether the user can update the section room.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\SectionRoom  $sectionRoom
     * @return mixed
     */
    public function update(User $user, SectionRoom $sectionRoom)
    {
        return $user->hasPermission('update-reference-section-room');
    }

    /**
     * Determine whether the user can delete the section room.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\SectionRoom  $sectionRoom
     * @return mixed
     */
    public function delete(User $user, SectionRoom $sectionRoom)
    {
        return $user->hasPermission('delete-reference-section-room');
    }

    /**
     * Determine whether the user can restore the section room.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\SectionRoom  $sectionRoom
     * @return mixed
     */
    public function restore(User $user, SectionRoom $sectionRoom)
    {
        return $user->hasPermission('restore-reference-section-room');
    }

    /**
     * Determine whether the user can permanently delete the section room.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reference\SectionRoom  $sectionRoom
     * @return mixed
     */
    public function destroy(User $user, SectionRoom $sectionRoom)
    {
        return $user->hasPermission('destroy-reference-section-room');
    }
}
