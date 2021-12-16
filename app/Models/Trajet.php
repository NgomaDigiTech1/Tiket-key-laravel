<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use JustSteveKing\KeyFactory\Models\Concerns\HasKey;

class Trajet extends Model
{
    use HasFactory, HasKey;

    protected $guarded = [];

    public function getPrices(): string
    {
        return number_format($this->prices, 1, ',', ' ').'FC';
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }
}
