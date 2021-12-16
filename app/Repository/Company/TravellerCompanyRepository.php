<?php
declare(strict_types=1);

namespace App\Repository\Company;

use App\Models\Traveller;
use App\Repository\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;

class TravellerCompanyRepository extends BaseRepositoryInterface
{
    public function getContents(): Collection|array
    {
        return Traveller::query()
            ->where('company_id', '=', auth()->user()->company->id)
            ->latest()
            ->get();
    }

    public function show(string $key): Model|Builder
    {
        return Traveller::query()
            ->where('company_id', '=', auth()->user()->company->id)
            ->where('key', '=', $key)
            ->with('bookings')
            ->first();
    }

    public function create($attributes): Model|Builder|RedirectResponse
    {
        // TODO: Implement create() method.
    }

    public function update(string $key, $attributes): Model|Builder
    {
        // TODO: Implement update() method.
    }

    public function delete(string $key): Model|Builder
    {
        $traveller = Traveller::query()
            ->where('company_id', '=', auth()->user()->company->id)
            ->where('key', '=', $key)
            ->first();
        $traveller->delete();
        toast("Client supprimer avec succes", 'info');
        return $traveller;
    }
}
