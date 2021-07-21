<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use App\Events\UserSuccessfullLogin;

class LogSuccessfulLogin
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        UserSuccessfullLogin::dispatch($event->user);
    }
}
