<?php
declare(strict_types=1);

namespace App\Repository;

use App\Models\Company;
use App\Services\ImageUploader;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class CompanyRepository extends Interfaces\BaseRepositoryInterface
{
    use ImageUploader;

    public function getContents(): Collection|array
    {
        return Company::query()
            ->latest()
            ->get();
    }

    public function show(string $key): Model|Builder
    {
        return Company::query()
            ->where('key', '=', $key)
            ->firstOrFail();
    }

    public function create($attributes): Model|Builder
    {
        $company = Company::query()
            ->create([
                'name_company' => $attributes->input('name_company'),
                'address' => $attributes->input('address'),
                'phone_number' => $attributes->input('phone_number'),
                'email' => $attributes->input('email'),
                'user_id' => $attributes->input('user_id'),
                'picture' => self::uploadFiles($attributes)
            ]);
        toast("Une nouvelle company a ete ajouter", 'success');
        return $company;
    }

    public function update(string $key, $attributes): Model|Builder
    {
        $company = $this->show($key);
        $this->removeOldImages($company);
        $this->updateCompany($company, $attributes);
        toast("Une mise a ete effectuer sur une company", 'warning');
        return $company;
    }

    public function delete(string $key): Model|Builder
    {
        $company = $this->show($key);
        $this->removeOldImages($company);
        $company->delete();
        toast("Une company a ete supprimer", 'info');
        return $company;
    }

    private function updateCompany($company, $attributes)
    {
        $company->update([
            'name_company' => $attributes->input('name_company'),
            'address' => $attributes->input('address'),
            'phone_number' => $attributes->input('phone_number'),
            'email' => $attributes->input('email'),
            'user_id' => $attributes->input('user_id'),
            'picture' => self::uploadFiles($attributes)
        ]);
    }
}
