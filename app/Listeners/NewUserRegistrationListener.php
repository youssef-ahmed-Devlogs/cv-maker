<?php

namespace App\Listeners;

use App\Events\NewUserRegistrationEvent;
use App\Models\User;
use App\Notifications\NewUserRegistration;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class NewUserRegistrationListener
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
     * @param  \App\Events\NewUserRegistrationEvent  $event
     * @return void
     */
    public function handle(NewUserRegistrationEvent $event)
    {
        $admins = User::where('id', '!=', $event->user->id)->where('role', '!=', 'user')->get();
        Notification::send($admins, new NewUserRegistration($event->user));

        // foreach ($admins as $admin)
        //     $admin->notify(new NewUserRegistration($event->user));
    }
}
