<?php
declare(strict_types=1);

namespace App\Repository\Company;

use App\Jobs\ConfirmedBookJob;
use App\Models\Booking;
use App\Models\Traveller;
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

    public function confirmedBooking(string $key): Model|Builder
    {
        $booking = $this->getBooking($key);
        $traveller = Traveller::query()
            ->where('company_id', '=', auth()->user()->company->id)
            ->where('id', '=', $booking->traveller_id)
            ->first();
        $booking->update([
            'status' => Booking::APPROVE_BOOKING
        ]);
        dispatch(new ConfirmedBookJob($booking, $traveller))->delay(now()->addSecond(5));
        return $booking;
    }

    public function invalidateRoom(string $key): Model|Builder|null
    {
        $booking = $this->getBooking($key);
        $traveller = Traveller::query()
            ->where('company_id', '=', auth()->user()->company->id)
            ->where('id', '=', $booking->traveller_id)
            ->first();
        $booking->update([
            'status' => Booking::PENDING_BOOKING
        ]);
        return $booking;
    }

    private function getBooking(string $key): null|Builder|Model
    {
        return Booking::query()
            ->where('company_id', '=', auth()->user()->company->id)
            ->where('key', '=', $key)
            ->first();
    }
}
