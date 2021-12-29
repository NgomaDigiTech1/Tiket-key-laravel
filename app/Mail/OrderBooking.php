<?php
declare(strict_types=1);

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderBooking extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public $booking){}

    public function build(): OrderBooking
    {
        return $this
            ->from('youness@ngomadigi.tech', 'confirmation')
            ->bcc('infos@domiyns.com')
            ->subject('Reservation d un ticket de transposrt')
            ->view('mails.booking.confirmation',[
                'booking' => $this->booking
            ]);
    }
}
