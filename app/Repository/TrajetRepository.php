<?php
declare(strict_types=1);

namespace App\Repository;

use App\Models\Trajet;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class TrajetRepository extends Interfaces\BaseRepositoryInterface
{

    public function getContents(): Collection|array
    {
        return Trajet::query()
            ->with('company')
            ->latest()
            ->get();
    }

    public function show(string $key): Model|Builder
    {
        return Trajet::query()
            ->where('key', '=', $key)
            ->first();
    }

    public function create($attributes): Model|Builder
    {
        $trajet = Trajet::query()
            ->create([
                'starting_city' => $attributes->input('starting_city'),
                'arrival_city' => $attributes->input('arrival_city'),
                'prices' => $attributes->input('prices'),
                'company_id' => $attributes->input('company_id'),
                'start_time' => $attributes->input('start_time'),
                'arrival_time' => $attributes->input('arrival_time'),
                'shutdowns' => $attributes->input('shutdowns')
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
            'company_id' => $attributes->input('company_id'),
            'prices' => $attributes->input('prices'),
            'start_time' => $attributes->input('start_time'),
            'arrival_time' => $attributes->input('arrival_time'),
            'shutdowns' => $attributes->input('shutdowns')
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
