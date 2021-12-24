<?php

namespace App\Repository;

use App\Models\Booking;
use Illuminate\Database\Eloquent\Collection;

class VerificationBackendRepository
{
    public function getBookingCode(): Collection|array
    {
        return Booking::query()
            ->with('traveller')
            ->get();
    }
}
