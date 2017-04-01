<?php

namespace Modules\CarRental\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Modules\CarRental\Entities\Reservation;

class ReservationCreated extends Mailable
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
        return $this->view('carrental::emails.reservation')
                    ->subject($this->reservation->id . ' No.lu Rezervasyon')
                    ->cc($this->reservation->email)
                    ->replyTo(setting('theme::email'), setting('theme::company-name'))
                    ->with(['reservation'=>$this->reservation]);
    }
}
