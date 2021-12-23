<?php
declare(strict_types=1);

namespace App\Repository\App;

use App\Models\Trajet;
use Illuminate\Database\Eloquent\Collection;

class BookingRepository
{
    public function getBookings($request): Collection|array
    {
        $trajet = Trajet::query()
            ->where('starting_city', '=', $request['data']['depart'])
            ->where('arrival_city', '=', $request['data']['arriver'])
            ->get();
        $trajet->load('company');
        return $trajet;
    }
}
