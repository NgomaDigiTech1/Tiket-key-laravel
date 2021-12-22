<?php
declare(strict_types=1);

namespace App\Repository;

use App\Jobs\ConfirmedBookJob;
use App\Models\Booking;
use App\Models\Traveller;
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
        $booking = $this->getBooking($key);
        $booking->load(['traveller', 'trajet', 'company']);
        return $booking;
    }

    public function create($attributes): Model|Builder
    {
        // TODO: Implement create() method.
    }

    public function update(string $key, $attributes): Model|Builder
    {
        $booking = $this->getBooking($key);
        $booking->update([
            'status' => Booking::APPROVE_BOOKING
        ]);
        toast("La reservation vient d'etre confirmer", 'warning');
        return $booking;
    }

    public function delete(string $key): Model|Builder
    {
        $booking = $this->getBooking($key);
        $booking->delete();
        toast("La reservation a ete annuler", 'info');
        return $booking;
    }

    public function confirmedRoom(string $key): Model|Builder
    {
        $booking = $this->getBooking($key);
        $traveller = Traveller::query()
            ->where('id', '=', $booking->traveller_id)
            ->first();
        $booking->status = Booking::APPROVE_BOOKING;
        $booking->save();
        dispatch(new ConfirmedBookJob($booking, $traveller))->delay(now()->addSecond(5));
        return $booking;
    }

    private function getBooking(string $key): null|Builder|Model
    {
        return Booking::query()
            ->where('key', '=', $key)
            ->first();
    }
}
