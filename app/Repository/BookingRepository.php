<?php
declare(strict_types=1);

namespace App\Repository;

use App\Models\Booking;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class BookingRepository extends Interfaces\BaseRepositoryInterface
{

    public function getContents(): Collection|array
    {
        return Booking::query()
            ->with(['traveller', 'trajet', 'company'])
            ->latest()
            ->get();
    }

    public function show(string $key): Model|Builder
    {
        $booking = Booking::query()
            ->where('key', '=', $key)
            ->first();
        $booking->load(['traveller', 'trajet', 'company']);
        return $booking;
    }

    public function create($attributes): Model|Builder
    {
        // TODO: Implement create() method.
    }

    public function update(string $key, $attributes): Model|Builder
    {
        $booking = Booking::query()
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
            ->where('key', '=', $key)
            ->first();
        $booking->delete();
        toast("La reservation a ete annuler", 'info');
        return $booking;
    }
}
