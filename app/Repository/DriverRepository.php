<?php
declare(strict_types=1);

namespace App\Repository;

use App\Models\Driver;
use App\Services\ImageUploader;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class DriverRepository extends Interfaces\BaseRepositoryInterface
{
    use ImageUploader;

    public function getContents(): Collection|array
    {
        return Driver::query()
            ->latest()
            ->get();
    }

    public function show(string $key): Model|Builder
    {
        return Driver::query()
            ->where('key', '=', $key)
            ->first();
    }

    public function create($attributes): Model|Builder
    {
        $driver = Driver::query()
            ->create([
                'first_name' => $attributes->input('first_name'),
                'name' => $attributes->input('name'),
                'age' => $attributes->input('age'),
                'phone_number' => $attributes->input('phone_number'),
                'picture' => self::uploadFiles($attributes) ?? "image.png",
                'company_id' => $attributes->input('company_id')
            ]);
        toast("Un chauffeur a ete ajouter a la liste", 'success');
        return $driver;
    }

    public function update(string $key, $attributes): Model|Builder
    {
        $driver = $this->show($key);
        $this->removeOldImages($driver);
        $this->updateDriver($driver, $attributes);
        toast("Une mise a jour a ete effectuer", 'warning');
        return $driver;
    }

    public function delete(string $key): Model|Builder
    {
        $driver = $this->show($key);
        $this->removeOldImages($driver);
        $driver->delete();
        toast("Un chauffeur a ete suspendue pour raison interne", 'info');
        return $driver;
    }

    private function updateDriver($driver, $attributes)
    {
        $driver->update([
            'first_name' => $attributes->input('first_name'),
            'name' => $attributes->input('name'),
            'age' => $attributes->input('age'),
            'phone_number' => $attributes->input('phone_number'),
            'picture' => self::uploadFiles($attributes) ?? "image.png",
            'company_id' => $attributes->input('company_id')
        ]);
    }
}
