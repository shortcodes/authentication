<?php

namespace Shortcodes\Authentication\Mail;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RemindPassword extends Mailable
{
    use Queueable, SerializesModels;

    private $user;

    function __construct($user)
    {
        $this->user = $user;
    }

    public function build()
    {
        $key = env('JWT_SECRET');

        $token = array(
            "iss" => "http://mindz.it",
            "iat" => Carbon::now()->timestamp,
            "exp" => Carbon::now()->addHour(1)->timestamp,
            "email" => $this->user->email,
            "purpose" => 'reset-password',
            "user_id" => $this->user->id,
        );

        $token = \Firebase\JWT\JWT::encode($token, $key);

        return $this->subject(config('mail.subjects.reset-password','Password reset request'))->view('authentication-package::emails.reset-password', ['token' => $token]);
    }
}
