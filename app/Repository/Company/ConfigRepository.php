<?php

namespace App\Repository\Company;

use App\Models\Booking;
use App\Models\Driver;
use App\Models\Event;
use App\Models\User;
use App\Services\ImageUploader;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ConfigRepository
{
    use ImageUploader;

    public function getJsonReservations(): Collection|array
    {
        return Booking::query()
            ->where('company_id', '=', auth()->user()->company->id)
            ->select(
                DB::raw("COUNT(*) as count"), \DB::raw("DAYNAME(created_at) as day_name"),
                DB::raw("DAY(created_at) as day")
            )
            ->where('created_at', '>', Carbon::today()->subDay(6))
            ->groupBy('day_name','day')
            ->orderBy('day')
            ->get();
    }

    public function updateUser(string $key, $attributes): Model|Builder
    {
        $user = User::query()
            ->where('key', '=', $key)
            ->firstOrFail();
        $this->removeOldImages($user);
        $user->update([
            'name' => $attributes->input('name'),
            'first_name' => $attributes->input('first_name'),
            'picture' => self::uploadFiles($attributes),
            'email' => $attributes->input('email'),
            'password' => Hash::make($attributes->input('password')),
            'phone_number' => $attributes->input('phone_number'),
        ]);
        $this->AddEvent();
        toast("Votre mise a ete effectuer sur votre compte", 'success');
        return $user;
    }

    public function updateCompany(string $key, $attributes)
    {
        $company = auth()->user()->company;
        $this->removeOldImages($company);
        $company->update([
            'name_company' => $attributes->input('name_company'),
            'picture' => self::uploadFiles($attributes),
            'address' => $attributes->input('address'),
            'phone_number' => $attributes->input('phone_number'),
            'email' => $attributes->input('email'),
            'description' => $attributes->input('description')
        ]);
        $this->AddEvent();
        toast("Les informations de votre companie vient d'etre modifier", 'success');
        return $company;
    }

    private function AddEvent(): Model|Builder
    {
        return Event::query()
            ->create([
                'event_name' => "Mise a jours des informations",
                'description' => auth()->user()->name. " vient de mettre a jours des informations de ". auth()->user()->company->name_company,
                'user_id' => auth()->id(),
                'company_id' => auth()->user()->company->id
            ]);
    }

    public function getUsersByWeek()
    {
        return User::select(
            DB::raw("(COUNT(*)) as count"),
            DB::raw("DAYNAME(created_at) as dayname")
        )
            ->whereBetween('created_at',
                [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]
            )
            ->whereYear('created_at', date('Y'))
            ->groupBy('dayname')
            ->get();
    }
}
