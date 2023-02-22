<?php

namespace App\Listeners;

use App\Events\UserRegisteredEvent;
use App\Notifications\UserRegisterNotificationMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendRegistrationEmail
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
     * @param  \App\Events\UserRegisteredEvent  $event
     * @return void
     */
    public function handle(UserRegisteredEvent $event)
    {
        $delay = now()->addMinutes(5);
        $event->user->notify((new UserRegisterNotificationMail($event->user))->delay($delay));
    }
}
