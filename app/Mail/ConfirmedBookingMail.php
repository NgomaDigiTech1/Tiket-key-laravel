<?php
declare(strict_types=1);

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Milon\Barcode\DNS2D;
use Picqer\Barcode\BarcodeGeneratorPNG;

class ConfirmedBookingMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public $booking, public $traveller){}

    public function build(): ConfirmedBookingMail
    {
        $content = `<img src="data:image/png;base64,` . DNS2D::getBarcodeHTML($this->booking->transaction_code, 'QRCODE') . `" alt="barcode"   />`;
        return $this
            ->from('ngomadigitech@gmail.com', 'confirmation')
            ->bcc('scotttresor@gmail.com')
            ->subject('Ticker de voyage')
            ->view('mails.booking.ticket',[
                'booking' => $this->booking[$content],
                'traveller' => $this->traveller,
            ]);
    }
}
