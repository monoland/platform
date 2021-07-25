<?php

namespace App\Policies\MyProfile;

use App\Models\MyProfile\Document;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DocumentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the document.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyProfile\Document  $document
     * @return mixed
     */
    public function show(User $user, Document $document)
    {
        return $user->hasPermission('show-myprofile-document');
    }

    /**
     * Determine whether the user can view the document.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyProfile\Document  $document
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-myprofile-document');
    }

    /**
     * Determine whether the user can create documents.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-myprofile-document');
    }

    /**
     * Determine whether the user can update the document.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyProfile\Document  $document
     * @return mixed
     */
    public function update(User $user, Document $document)
    {
        return $user->hasPermission('update-myprofile-document');
    }

    /**
     * Determine whether the user can delete the document.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyProfile\Document  $document
     * @return mixed
     */
    public function delete(User $user, Document $document)
    {
        return $user->hasPermission('delete-myprofile-document');
    }

    /**
     * Determine whether the user can restore the document.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyProfile\Document  $document
     * @return mixed
     */
    public function restore(User $user, Document $document)
    {
        return $user->hasPermission('restore-myprofile-document');
    }

    /**
     * Determine whether the user can permanently delete the document.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyProfile\Document  $document
     * @return mixed
     */
    public function destroy(User $user, Document $document)
    {
        return $user->hasPermission('destroy-myprofile-document');
    }
}
