<?php
declare(strict_types=1);

namespace App\Repository\App;

use App\Jobs\BookingJob;
use App\Models\Booking;
use App\Models\Company;
use App\Models\Town;
use App\Models\Trajet;
use App\Models\Traveller;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class HomeRepository
{
    public function getTowns(): Collection|array
    {
        return Town::query()
            ->get();
    }

    public function getCompanies(): Collection|array
    {
        return Company::query()
            ->orderBy('created_at', 'DESC')
            ->get();
    }

    public function showDetails(string $company): Model|Builder|null
    {
        $company =  Company::query()
            ->where('name_company', '=', $company)
            ->with('trajets')
            ->first();
        return $company;
    }

    public function showBooking(string $key): Model|Builder|null
    {
        return Trajet::query()
            ->where('key', '=', $key)
            ->first();
    }

    public function book(Request $request): Model|Builder
    {
        $data = validator(request()->all(), [
            "first_name" => ['required'],
            "name" => ['required'],
            "email" => ['required', 'email'],
            "phone_number" => ['required'],
            "trajet_key" => ['required'],
            'trajet_key.*' => ['string', Rule::exists('trajets', 'key')],
        ])->validate();

        $trajet = Trajet::query()
            ->where('key', '=', $data['trajet_key'])
            ->first();

        $traveller = Traveller::query()
            ->create([
                'name' => $data['name'],
                'first_name' => $data['first_name'],
                'email' => $data['email'],
                'phone_number' => $data['phone_number'],
                'company_id' => $trajet->company->id
            ]);

        $this->StoreBooking($trajet, $traveller);

        toast("Votre reservation a ete envoyer avec succes", 'success');
        return $traveller;
    }

    private function StoreBooking($trajet, $traveller): void
    {
        $booking = Booking::query()
            ->create([
                'trajet_id' => $trajet->id,
                'status' => Booking::PENDING_BOOKING,
                'traveller_id' => $traveller->id,
                'company_id' => $trajet->company->id,
                'transaction_code' => $this->generateRandomTransaction(7)
            ]);
        dispatch(new BookingJob($booking, $traveller))->delay(now()->addSecond(5));
    }

    private function  generateRandomTransaction(int $number): string
    {
        $characters = '0123456789#abcdefghilkmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $number; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }
        return $randomString;
    }
}
