<?php

namespace App\Repository\Company;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class ConfigRepository
{
    public function show(string $key): Model|Builder|null
    {
        return User::query()
            ->where('key', '=', $key)
            ->first();
    }
}
