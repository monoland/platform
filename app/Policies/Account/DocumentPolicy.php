<?php

namespace App\Policies\Account;

use App\Models\Account\Document;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DocumentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the document.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Account\Document  $document
     * @return mixed
     */
    public function show(User $user, Document $document)
    {
        return $user->hasPermission('show-account-document');
    }

    /**
     * Determine whether the user can view the document.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Account\Document  $document
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-account-document');
    }

    /**
     * Determine whether the user can create documents.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-account-document');
    }

    /**
     * Determine whether the user can update the document.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Account\Document  $document
     * @return mixed
     */
    public function update(User $user, Document $document)
    {
        return $user->hasPermission('update-account-document');
    }

    /**
     * Determine whether the user can delete the document.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Account\Document  $document
     * @return mixed
     */
    public function delete(User $user, Document $document)
    {
        return $user->hasPermission('delete-account-document');
    }

    /**
     * Determine whether the user can restore the document.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Account\Document  $document
     * @return mixed
     */
    public function restore(User $user, Document $document)
    {
        return $user->hasPermission('restore-account-document');
    }

    /**
     * Determine whether the user can permanently delete the document.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Account\Document  $document
     * @return mixed
     */
    public function destroy(User $user, Document $document)
    {
        return $user->hasPermission('destroy-account-document');
    }
}
