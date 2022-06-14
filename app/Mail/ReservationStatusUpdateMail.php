<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReservationStatusUpdateMail extends Mailable
{
    use Queueable, SerializesModels;

    public string $message;

    public function __construct($message)
    {
        $this->message = $message;
    }

    public function build()
    {
        return $this
            ->subject('Paslaugos užsakymo atnaujinimas')
            ->markdown('emails.reservation_status_update')
            ->with('message', $this->message);
    }
}
