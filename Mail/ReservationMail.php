<?php

namespace Modules\Carrental\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Modules\Carrental\Entities\Reservation;

class ReservationMail extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * @var Reservation
     */
    private $reservation;

    /**
     * ReservationCreated constructor.
     * @param Reservation $reservation
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
                    ->markdown('carrental::emails.reservation', ['reservation'=>$this->reservation]);
    }
}
