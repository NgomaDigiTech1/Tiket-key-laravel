<?php

namespace App\Repository\Company;

use App\Models\User;
use App\Services\ImageUploader;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class ConfigRepository
{
    use ImageUploader;

    public function updateUser(string $key, $attributes)
    {
        $user = User::query()
            ->where('key', '=', $key)
            ->firstOrFail();
        $user->update([

        ]);
    }
}
