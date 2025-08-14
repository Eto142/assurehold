<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AttorneyConnectionConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $userName;

    public function __construct($userName)
    {
        $this->userName = $userName;
    }

    public function build()
    {
        return $this->from('assurehold@unionsavertbc.cc', 'AssureHold Support')
                    ->subject('We Received Your Attorney Connection Request')
                    ->view('emails.attorney_connection_confirmation')
                    ->with([
                        'userName' => $this->userName,
                        'year' => date('Y'),
                    ]);
    }
}
