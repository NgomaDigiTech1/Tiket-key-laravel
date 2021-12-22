<?php
declare(strict_types=1);

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Queue\SerializesModels;

class BookingConfirmationNotification extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public $booking, public  $traveller){}

    public function build(): BookingConfirmationNotification
    {
        return $this
            ->from('no-replay@example.com', 'Confirmation du salle')
            ->view('emails.reservation')
            ->with('room',  $this->booking);
    }
}
