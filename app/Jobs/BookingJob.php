<?php
declare(strict_types=1);
namespace App\Jobs;

use App\Mail\ConfirmedBookingMail;
use App\Mail\OrderBooking;
use App\Notifications\BookingNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class BookingJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(public $booking, public $traveller){}

    public function handle()
    {
        Mail::to($this->traveller->email)->send(new OrderBooking($this->booking));
    }
}
