<?php

namespace App\Listeners;

use App\Events\NewUser;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;
use App\Mail\NewUserVerification;
use App\UserVerification;
use Auth;


class SendVerificitionMail
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
     * Generate VerificationToken and save on db.
     * Send Verification Mail to user
     * Logout registered user
     * Redirect to
     *
     * @param  NewUser  $event
     * @return void
     */
    public function handle(NewUser $event)
    {
        $token = $event->user->userverification()->create([
            'token' => bin2hex(random_bytes(32))
        ]);

        Mail::to($event->user->email)->send(new NewUserVerification($event->user));
    }
}
