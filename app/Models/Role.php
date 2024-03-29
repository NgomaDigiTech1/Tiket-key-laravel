<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use JustSteveKing\KeyFactory\Models\Concerns\HasKey;

class Role extends Model
{
    use HasFactory, HasKey;

    protected $guarded = [];

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
