<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use App\Mail\CredentialsMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendEmailCredentials
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
     * @param  UserRegistered  $event
     * @return void
     */
    public function handle(UserRegistered $event)
    {
        Mail::to($event->user['email'])->send(new CredentialsMail($event->user, $event->password));
    }
}
