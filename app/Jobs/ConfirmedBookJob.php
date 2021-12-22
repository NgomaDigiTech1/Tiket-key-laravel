<?php
declare(strict_types=1);
namespace App\Jobs;

use App\Mail\BookingMail;
use App\Notifications\BookingConfirmationNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class ConfirmedBookJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(public $booking, public $traveller){}

    public function handle()
    {
        Mail::to($this->traveller->email)->send(new BookingMail($this->booking, $this->traveller));
    }
}
