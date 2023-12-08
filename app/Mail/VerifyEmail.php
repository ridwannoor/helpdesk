<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Preference;

class VerifyEmail extends Mailable
{
    use Queueable, SerializesModels;

    // public $pin;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->email = $pin['email'];
        // $this->token = $pin['token'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
   
       public function build()
        {
            $pref = Preference::find(1);
            return $this->from($pref->email)
                ->subject("Email Verification")
                ->view('front.forgetpassword')
                ->with([
                    'email' => $this->email,
                    'token' => $this->token,
                ]);
        }
            
}
