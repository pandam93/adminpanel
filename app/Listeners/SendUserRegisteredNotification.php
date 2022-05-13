<?php

namespace App\Listeners;

use App\Notifications\UserRegistered;
use App\Models\User;
use Illuminate\Support\Facades\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendUserRegisteredNotification
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
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $admin = User::find(1);

        Notification::send($admin, new UserRegistered($event->user));
        //$admin->notify(new UserRegistered($event->user));
    }
}
