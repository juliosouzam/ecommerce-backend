<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\SendRegisterSuccessfullEmail;
use Illuminate\Support\Facades\Mail;

class RegisterSucessfulNotification
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $event->user->notify(new SendRegisterSuccessfullEmail($event->user));
    }
}
