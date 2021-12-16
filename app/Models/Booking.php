<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use JustSteveKing\KeyFactory\Models\Concerns\HasKey;

class Booking extends Model
{
    use HasFactory, HasKey;

    const APPROVE_BOOKING = true;
    const PENDING_BOOKING = false;

    protected $guarded = [];

    public function traveller(): BelongsTo
    {
        return $this->belongsTo(Traveller::class, 'traveller_id');
    }

    public function trajet(): BelongsTo
    {
        return $this->belongsTo(Trajet::class, 'trajet_id');
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
}
