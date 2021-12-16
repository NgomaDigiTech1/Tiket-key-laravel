<?php
declare(strict_types=1);

namespace App\Repository\Interfaces;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;

abstract class BaseRepositoryInterface
{
    abstract public function getContents(): Collection|array;

    abstract public function show(string $key): Model|Builder;

    abstract public function create($attributes): Model|Builder|RedirectResponse;

    abstract public function update(string $key, $attributes): Model|Builder;

    abstract public function delete(string $key): Model|Builder;
}
