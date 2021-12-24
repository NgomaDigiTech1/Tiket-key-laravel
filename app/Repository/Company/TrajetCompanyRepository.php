<?php
declare(strict_types=1);

namespace App\Repository\Company;

use App\Models\Trajet;
use App\Repository\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;

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

    public function create($attributes): Model|Builder|RedirectResponse
    {
        $trajet = $this->getTrajets($attributes);
        if ($trajet){
            toast("Ce trajet existe deja", 'error');
            return redirect()->route('company.trajets.create');
        }
        $trajet = Trajet::query()
            ->create([
                'starting_city' => $attributes->input('starting_city'),
                'arrival_city' => $attributes->input('arrival_city'),
                'prices' => $attributes->input('prices'),
                'company_id' => auth()->user()->company->id,
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
            'company_id' => auth()->user()->company->id,
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

    private function getTrajets($attributes): Model|Builder|null
    {
        return Trajet::query()
            ->where('company_id', '=', auth()->user()->company->id)
            ->where('starting_city', '=', $attributes->input('starting_city'))
            ->where('arrival_city', '=', $attributes->input('arrival_city'))
            ->first();
    }
}
