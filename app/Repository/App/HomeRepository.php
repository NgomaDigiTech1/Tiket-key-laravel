<?php
declare(strict_types=1);

namespace App\Repository\App;

use App\Models\Booking;
use App\Models\Company;
use App\Models\Town;
use App\Models\Trajet;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

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
            ->first();
        return $company->load('trajets');
    }

    public function showBooking(string $key): Model|Builder|null
    {
        return Trajet::query()
            ->where('key', '=', $key)
            ->first();
    }
}
