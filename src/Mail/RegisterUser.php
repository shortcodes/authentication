<?php

namespace Shortcodes\Authentication\Mail;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegisterUser extends Mailable
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
            "exp" => Carbon::now()->addHours(24)->timestamp,
            "email" => $this->user->email,
            "purpose" => 'register-user',
            "user_id" => $this->user->id,
        );

        $token = \Firebase\JWT\JWT::encode($token, $key);

        return $this->subject(config('mail.subjects.user-registration','User registration'))->view('authentication-package::emails.register-user', ['token' => $token]);
    }
}
