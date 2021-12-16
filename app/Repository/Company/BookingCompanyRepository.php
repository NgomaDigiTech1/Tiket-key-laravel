<?php
declare(strict_types=1);

namespace App\Repository\Company;

use App\Models\Booking;
use App\Repository\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class BookingCompanyRepository extends BaseRepositoryInterface
{

    public function getContents(): Collection|array
    {
        return Booking::query()
            ->where('company_id', '=', auth()->user()->company->id)
            ->with(['traveller', 'trajet'])
            ->latest()
            ->get();
    }

    public function show(string $key): Model|Builder
    {
        $booking = Booking::query()
            ->where('company_id', '=', auth()->user()->company->id)
            ->where('key', '=', $key)
            ->first();
        $booking->load(['traveller', 'trajet']);
        return $booking;
    }

    public function create($attributes): Model|Builder
    {
        // TODO: Implement create() method.
    }

    public function update(string $key, $attributes): Model|Builder
    {
        $booking = Booking::query()
            ->where('company_id', '=', auth()->user()->company->id)
            ->where('key', '=', $key)
            ->first();
        $booking->update([
            'status' => Booking::APPROVE_BOOKING
        ]);
        toast("La reservation vient d'etre confirmer", 'warning');
        return $booking;
    }

    public function delete(string $key): Model|Builder
    {
        $booking = Booking::query()
            ->where('company_id', '=', auth()->user()->company->id)
            ->where('key', '=', $key)
            ->first();
        $booking->delete();
        toast("La reservation a ete annuler", 'info');
        return $booking;
    }
}
