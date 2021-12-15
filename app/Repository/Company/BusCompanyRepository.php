<?php
declare(strict_types=1);

namespace App\Repository\Company;

use App\Models\Bus;
use App\Repository\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class BusCompanyRepository extends BaseRepositoryInterface
{
    public function getContents(): Collection|array
    {
        return Bus::query()
            ->where('company_id', '=', auth()->user()->company->id)
            ->latest()
            ->get();
    }

    public function show(string $key): Model|Builder
    {
        return Bus::query()
            ->where('company_id', '=', auth()->user()->company->id)
            ->where('key', '=', $key)
            ->first();
    }

    public function create($attributes): Model|Builder
    {
        $bus = Bus::query()
            ->create([
                'code_bus' => $attributes->input('code_bus'),
                'place_number' => $attributes->input('place_number'),
                'colors' => $attributes->input('colors'),
                'company_id' => auth()->user()->company->id,
                'driver_id' => $attributes->input('driver_id')
            ]);
        toast("Un nouveau bus a ete ajouter a une company",'success');
        return $bus;
    }

    public function update(string $key, $attributes): Model|Builder
    {
        $bus = $this->show($key);
        $bus->update([
            'code_bus' => $attributes->input('code_bus'),
            'place_number' => $attributes->input('place_number'),
            'colors' => $attributes->input('colors'),
            'company_id' => auth()->user()->company->id,
            'driver_id' => $attributes->input('driver_id')
        ]);
        toast("Une mise a jour a ete effectuer sur un bus", 'warning');
        return $bus;
    }

    public function delete(string $key): Model|Builder
    {
        $bus = $this->show($key);
        $bus->delete();
        toast("Un bus a ete supprimer", 'info');
        return $bus;
    }
}
