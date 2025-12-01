<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;

class RedirectAdminAfterLogin
{
    /**
     * Handle the event.
     *
     * @param  \Illuminate\Auth\Events\Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        $user = $event->user;

        if ($user && $user->is_admin) {
            // Set the intended URL so Laravel's redirect()->intended() will honor it after login
            session()->put('url.intended', route('admin.users.index'));
        }
    }
}
