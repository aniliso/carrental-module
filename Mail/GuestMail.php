<?php

namespace Modules\Carrental\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\Carrental\Entities\Reservation;

class GuestMail extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * @var Reservation
     */
    private $reservation;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Reservation $reservation)
    {
        $this->reservation = $reservation;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->reservation->id . ' No.lu Rezervasyon')
            ->replyTo(setting('theme::email'), setting('theme::company-name'))
            ->markdown('carrental::emails.guest', ['reservation'=>$this->reservation]);
    }
}
