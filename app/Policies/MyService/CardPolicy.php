<?php

namespace App\Policies\MyService;

use App\Models\MyService\Card;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CardPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the card.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyService\Card  $card
     * @return mixed
     */
    public function show(User $user, Card $card)
    {
        return $user->hasPermission('show-myservice-card');
    }

    /**
     * Determine whether the user can view the card.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyService\Card  $card
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-myservice-card');
    }

    /**
     * Determine whether the user can create cards.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-myservice-card');
    }

    /**
     * Determine whether the user can update the card.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyService\Card  $card
     * @return mixed
     */
    public function update(User $user, Card $card)
    {
        return $user->hasPermission('update-myservice-card');
    }

    /**
     * Determine whether the user can delete the card.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyService\Card  $card
     * @return mixed
     */
    public function delete(User $user, Card $card)
    {
        return $user->hasPermission('delete-myservice-card');
    }

    /**
     * Determine whether the user can restore the card.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyService\Card  $card
     * @return mixed
     */
    public function restore(User $user, Card $card)
    {
        return $user->hasPermission('restore-myservice-card');
    }

    /**
     * Determine whether the user can permanently delete the card.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MyService\Card  $card
     * @return mixed
     */
    public function destroy(User $user, Card $card)
    {
        return $user->hasPermission('destroy-myservice-card');
    }
}
