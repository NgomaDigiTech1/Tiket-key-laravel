<?php
declare(strict_types=1);

namespace App\Repository\Company;

use App\Models\Booking;
use Illuminate\Database\Eloquent\Collection;

class VerificationRepository
{
    public function getBookingCode(): Collection|array
    {
        return Booking::query()
            ->where('company_id', '=', auth()->user()->company->id)
            ->with('traveller')
            ->get();
    }
}
