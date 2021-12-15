<?php
declare(strict_types=1);

namespace App\Repository\Company;

use App\Models\Trajet;
use App\Repository\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class TrajetCompanyRepository extends BaseRepositoryInterface
{
    public function getContents(): Collection|array
    {
        return Trajet::query()
            ->where('company_id', '=', auth()->user()->company->id)
            ->latest()
            ->get();
    }

    public function show(string $key): Model|Builder
    {
        return Trajet::query()
            ->where('company_id', '=', auth()->user()->company->id)
            ->where('key', '=', $key)
            ->firstOrFail();
    }

    public function create($attributes): Model|Builder
    {
        $trajet = Trajet::query()
            ->create([
                'starting_city' => $attributes->input('starting_city'),
                'arrival_city' => $attributes->input('arrival_city'),
                'prices' => $attributes->input('prices'),
                'company_id' => auth()->user()->company->id
            ]);
        toast("Une nouvelle destination a ete ajouter", 'success');
        return $trajet;
    }

    public function update(string $key, $attributes): Model|Builder
    {
        $trajet = $this->show($key);
        $trajet->update([
            'starting_city' => $attributes->input('starting_city'),
            'arrival_city' => $attributes->input('arrival_city'),
            'company_id' => auth()->user()->company->id,
            'prices' => $attributes->input('prices'),
        ]);
        toast("Une mise a jours a ete faite sur une  destination", 'warning');
        return $trajet;
    }

    public function delete(string $key): Model|Builder
    {
        $trajet = $this->show($key);
        $trajet->delete();
        toast("Une destination a ete supprimer", 'info');
        return $trajet;
    }
}
