<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use JustSteveKing\KeyFactory\Models\Concerns\HasKey;

class Payment extends Model
{
    use HasFactory, HasKey;

    protected $guarded = [];

    public function travel(): HasMany
    {
        return $this->hasMany(Traveller::class);
    }

    public function trajet(): HasMany
    {
        return $this->hasMany(Trajet::class);
    }
}
