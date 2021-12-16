<?php

namespace App\Repository\Company;

use App\Models\Event;
use App\Models\User;
use App\Services\ImageUploader;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class ConfigRepository
{
    use ImageUploader;

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
}
