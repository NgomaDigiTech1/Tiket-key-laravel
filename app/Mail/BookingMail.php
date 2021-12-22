<?php
declare(strict_types=1);

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookingMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public $booking){}

    public function build()
    {
        return $this
            ->from('example@example.com', 'Example')
            ->view('mails.booking.confirmation')
            ->with([
                'booking' => $this->booking
            ]);
    }
}
