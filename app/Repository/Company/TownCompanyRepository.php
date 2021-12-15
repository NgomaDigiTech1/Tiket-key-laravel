<?php
declare(strict_types=1);

namespace App\Repository\Company;

use App\Models\Town;
use App\Repository\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class TownCompanyRepository extends BaseRepositoryInterface
{
    public function getContents(): Collection|array
    {
        return Town::query()
            ->latest()
            ->get();
    }

    public function show(string $key): Model|Builder
    {
        return Town::query()
            ->where('key', '=', $key)
            ->firstOrFail();
    }

    public function create($attributes): Model|Builder
    {
        $town = Town::query()
            ->create([
                'name_town' => $attributes->input('name_town')
            ]);
        toast("Une nouvelle ville a ete Ajouter", 'success');
        return $town;
    }

    public function update(string $key, $attributes): Model|Builder
    {
        $town = $this->show($key);
        $town->update([
            'name_town' => $attributes->input('name_town')
        ]);
        toast("Une mise a jour a ete effectuer", 'warning');
        return $town;
    }

    public function delete(string $key): Model|Builder
    {
        $town = $this->show($key);
        $town->delete();
        toast("Ville supprimer avec success", 'info');
        return $town;
    }
}
