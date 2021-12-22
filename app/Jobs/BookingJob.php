<?php
declare(strict_types=1);
namespace App\Jobs;

use App\Mail\BookingMail;
use App\Notifications\BookingNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Notification;

class BookingJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(public $booking, public $traveller){}

    public function handle()
    {
        Notification::send($this->traveller->email, new BookingMail($this->booking));
    }
}
